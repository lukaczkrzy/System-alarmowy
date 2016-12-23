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
	
	$query = sprintf( "SELECT * FROM dane_uzytkownikow WHERE login = '%s' ", //wstrzykiwanie sql eliminacja
			mysqli_real_escape_string($polaczenie, $login));//poprzez typ string
	$szukaj = mysqli_query( $polaczenie, $query ); //wyslanie zapytania sql
	
	$liczba_uzytkownikow = mysqli_num_rows( $szukaj ); //zwraca liczbe uzytkownikow 

	if( $liczba_uzytkownikow == 1 )
	{
		$dane = mysqli_fetch_assoc( $szukaj ); //tablica skojarzona z nazwami kolumn w db
		
		if( password_verify( $haslo, $dane['haslo']) ) //weryfikacja hasła hashowanego z podanym
		{
			$_SESSION['id_uzytkow'] = $dane['id'];
			$_SESSION['email'] = $dane[ 'email' ]; //wypisywanie danych z db
			$_SESSION['ip'] = $dane[ 'ip' ];
			$_SESSION['login'] = $dane[ 'login' ];
			$_SESSION['godz_logowania'] = $dane['data_logowania'];
	
			$_SESSION['zalogowano'] = true; 
		
			unset($_SESSION['blad_log']);    //usun zmienna 
		
			mysqli_free_result( $szukaj );   //usunięcie danych 
			header( 'Location: zalogowano.php' );
		}
		else
		{
			$_SESSION['blad_log'] = "<br>Błąd logowania do seriwsu, zły login bądz hasło";
			header('Location: index.php' ); //powrot do logowania
		}
	}
	else 
	{
		$_SESSION['blad_log'] = "<br>Błąd logowania do seriwsu, zły login bądz hasło";
		header('Location: index.php' ); //powrot do logowania
	}
	mysqli_close( $polaczenie ); //zamkniecie polaczenia
}