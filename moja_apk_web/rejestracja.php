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
		$_SESSION['blad_login'] = "Login powinien zawierać od 5 do 20 znaków!";
		header('Location: rejestracja_form.php');
	}
	
	$znaki_spec = ctype_alnum( $login ); //eliminacja znaków specjalnych <> itp. alfanumeryczne
	
	if( $znaki_spec == false ) 
	{
		$sprawdzenie_danych = false;
		$_SESSION['blad_login'] = "Login powinien składać się z liter i cyfr bez polskich znaków!";
		header('Location: rejestracja_form.php'); 
	}
	
	$haslo = $_POST['haslo'];
	$haslo1 = $_POST['haslo1']; //sprawdzanie hasla
	
	$dl_haslo = strlen( $haslo ); //dlugosc hasla pierwszego
	
	if( $dl_haslo < 5 || $dl_haslo > 20 )
	{
		$sprawdzenie_danych = false;
		$_SESSION['blad_haslo'] = "Hasło powinno składać się od 5 do 20 znaków!";
		header('Location: rejestracja_form.php');
	}
	
	if( $haslo != $haslo1 )
	{
		$sprawdzenie_danych = false;
		$_SESSION['blad_haslo'] = "Podane hasła róznią się!";
		header('Location: rejestracja_form.php');
	}
	
	if( !isset( $_POST['regulamin'] ) ) //akceptacja regulaminu
	{
		$sprawdzenie_danych = false;
		$_SESSION['blad_regulamin'] = "Zaakcepuj regulamin!";
		header('Location: rejestracja_form.php');
	}
	
	$klucz_capcha = "6LeFWAoUAAAAAMObUZOdeqNTF7N3jD_LHFvWAB_8";
	$sprawdz_capcha = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$klucz_capcha.'&response='.$_POST['g-recaptcha-response']); //pobierz zawartosc pliku do zmiennej w nawiasie adres pliku w google
	
	$odpowedz_google = json_decode( $sprawdz_capcha ); //dekodowanie warosci json z googla
	
	if( $odpowedz_google->success == false ) 
	{
		$sprawdzenie_danych = false;
		$_SESSION['blad_captcha'] = "Brak weryfikacji uzytkownika!";
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
			$_SESSION['blad_uzytkownik'] = "Użytkownik o podanym loginie już istnieje!";
			header('Location: rejestracja_form.php');
		}
		
		$query = sprintf( "SELECT * FROM dane_uzytkownikow WHERE email = '%s' ", //wstrzykiwanie sql eliminacja
				mysqli_real_escape_string($polaczenie, $email));//poprzez typ string
		
		$szukaj = mysqli_query( $polaczenie, $query ); //wyslanie zapytania sql
		$liczba_uzytkownikow = mysqli_num_rows( $szukaj ); //zwraca liczbe uzytkownikow
		
		if( $liczba_uzytkownikow != 0 )
		{
			$brak_urzytkownika = false;
			$_SESSION['blad_uzytkownik_email'] = "Użytkownik o podanym email już istnieje!";
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

