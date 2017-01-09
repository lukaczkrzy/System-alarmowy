<?php

session_start();

if( isset( $_POST['login'] ) ) //sprawdzanie czy formularz został wysłąny
{
	$sprawdzenie_danych = true; //flaga poprawnosci danych
	
	$login = $_POST['login']; //sprawdzenie poprawnosci loginu
	$dlugosc_loginu = strlen( $login );
	
	if( $dlugosc_loginu < 5 || $dlugosc_loginu > 20 )
	{
		$sprawdzenie_danych = false;
		$_SESSION['blad_login'] = '<p style = "color: red"> Login powinien zawierać od 5 do 20 znaków! <br><br></p>';
		header('Location: rejestracja_form.php');
	}
	
	$znaki_spec = ctype_alnum( $login ); //eliminacja znaków specjalnych <> itp. alfanumeryczne
	
	if( $znaki_spec == false ) 
	{
		$sprawdzenie_danych = false;
		$_SESSION['blad_login'] = '<p style = "color: red"> Login powinien składać się z liter i cyfr! <br><br></p>';
		header('Location: rejestracja_form.php'); 
	}
	
	$haslo = $_POST['haslo'];
	$haslo1 = $_POST['haslo1']; //sprawdzanie hasla
	
	$dl_haslo = strlen( $haslo ); //dlugosc hasla pierwszego
	
	if( $dl_haslo < 5 || $dl_haslo > 20 )
	{
		$sprawdzenie_danych = false;
		$_SESSION['blad_haslo'] = '<p style = "color: red"> Hasło powinno zawierać od 5 do 20 znaków! <br><br></p>';
		header('Location: rejestracja_form.php');
	}
	
	if( $haslo != $haslo1 )
	{
		$sprawdzenie_danych = false;
		$_SESSION['blad_haslo'] = '<p style = "color: red"> Podane hasła nie są takie same! <br><br></p>';
		header('Location: rejestracja_form.php');
	}
	
	if( !isset( $_POST['regulamin'] ) ) //akceptacja regulaminu
	{
		$sprawdzenie_danych = false;
		$_SESSION['blad_regulamin'] = '<p style = "color: red"> Zaakceptuj regulamin! <br><br></p>';
		header('Location: rejestracja_form.php');
	}
	
	$email = $_POST['email'];
	$brak_urzytkownika = true;
	
	require_once 'log_db.php';
	$polaczenie = mysqli_connect( $host_db, $login_db, $haslo_db, $nazwa_db );
	
	if( $sprawdzenie_danych == true ) //zapis danych rejestracji do bazy danych po uprzednim sprawdzeniu 
	{
		
		$login = htmlentities( $login ); //eliminacja nieporzadanych znakow /- itp. zamiana na string
		
		$query = sprintf( "SELECT * FROM dane_uzytkownikow WHERE login = '%s' ", //wstrzykiwanie sql eliminacja
				mysqli_real_escape_string($polaczenie, $login));//poprzez typ string
		
		$szukaj = mysqli_query( $polaczenie, $query ); //wyslanie zapytania sql
		$liczba_uzytkownikow = mysqli_num_rows( $szukaj ); //zwraca liczbe uzytkownikow
		
		if( $liczba_uzytkownikow != 0 )
		{
			$brak_urzytkownika = false;
			$_SESSION['blad_uzytkownik'] = '<p style = "color: red"> Użytkownik o podanym loginie już istnieje! <br><br></p>';
			header('Location: rejestracja_form.php');
		}
		
		$query = sprintf( "SELECT * FROM dane_uzytkownikow WHERE email = '%s' ", //wstrzykiwanie sql eliminacja
				mysqli_real_escape_string($polaczenie, $email));//poprzez typ string
		
		$szukaj = mysqli_query( $polaczenie, $query ); //wyslanie zapytania sql
		$liczba_uzytkownikow = mysqli_num_rows( $szukaj ); //zwraca liczbe uzytkownikow
		
		if( $liczba_uzytkownikow != 0 )
		{
			$brak_urzytkownika = false;
			$_SESSION['blad_uzytkownik_email'] = '<p style = "color: red"> Użytkownik o padanym adresie email już istnieje! <br><br></p>';
			header('Location: rejestracja_form.php');
		}
		
		if( $brak_urzytkownika == true ) //zapis do db wpisanych danych w formularzu
		{
			$haslo_hash = password_hash( $haslo, PASSWORD_DEFAULT );
			$data = date('Y-m-d H:i:s');
			$ip = $_SERVER['SERVER_ADDR'];
			$query = " INSERT INTO `dane_uzytkownikow`(`login`, `haslo`, `email`, `data_rejestracji`, `ip`) 
					VALUES ( '$login', '$haslo_hash', '$email', '$data', '$ip' ) ";
			mysqli_query( $polaczenie, $query ); //wyslanie zapytania sql
			header('Location: zarejestrowano.php');
		}
		
		mysqli_close( $polaczenie ); //zamkniecie polaczenia
	}
	
	
}

