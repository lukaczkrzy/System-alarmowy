<?php

session_start(); //sesja po to aby była mozliwosc przesylania danych miedzy plikami

if( !isset( $_POST['login'] ) || !isset($_POST['haslo'] ))
{
	header('Location: formularz_logowania.php' ); //powrot do logowania
	exit();
}

require_once 'log_db.php'; //dolacz plik z loginem do db

$polaczenie = mysqli_connect( $host_db, $login_db, $haslo_db, $nazwa_db ); //polaczenie z bd

if( !$polaczenie ) //jesli rozne od zera 
{
	echo "Błąd połączenia z bazą danych". mysqli_errno( $polaczenie );
}
else //to szukaj danych
{
	$login = $_POST['login']; //odczytanie danych z formularza
	$haslo = $_POST['haslo'];
	
	$login = htmlentities( $login ); //eliminacja nieporzadanych znakow /- itp. zamiana na string
	
	$zapytanie = sprintf( "SELECT * FROM dane_uzytkownikow WHERE login = '%s' ", //wstrzykiwanie sql eliminacja
			mysqli_real_escape_string($polaczenie, $login));//poprzez typ string
	$szukaj = mysqli_query( $polaczenie, $zapytanie ); //wyslanie zapytania sql
	
	$liczba_uzytkownikow = mysqli_num_rows( $szukaj ); //zwraca liczbe uzytkownikow 

	if( $liczba_uzytkownikow == 1 )
	{
		$dane = mysqli_fetch_assoc( $szukaj ); //tablica skojarzona z nazwami kolumn w db
		
		if( password_verify( $haslo, $dane['haslo']) ) //weryfikacja hasła hashowanego z podanym
		{
			$_SESSION['login'] = $dane[ 'login' ];
		
			$_SESSION['zalogowano'] = true;
			
			if( $dane['login'] == 'lukacz' )
				$_SESSION['admin_zalogowany'] = true;
			else
				unset( $_SESSION['admin_zalogowany'] );
		
			unset($_SESSION['blad_log']);    //usun zmienna 
		
			mysqli_free_result( $szukaj );   //usunięcie danych 
			header( 'Location: index.php' );
		}
		else
		{
			$_SESSION['blad_log'] = '<p style = "color: red"> Błąd logowania, zły login bądz hasło!!! <br><br></p>';
			header('Location: formularz_logowania.php' ); //powrot do logowania
		}
	}
	else 
	{
		$_SESSION['blad_log'] = '<p style = "color: red"> Błąd logowania, zły login bądz hasło!!!<br><br></p>';
		header('Location: formularz_logowania.php' ); //powrot do logowania
	}
	mysqli_close( $polaczenie ); //zamkniecie polaczenia
}