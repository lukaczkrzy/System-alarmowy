
<?php

	session_start();

	require_once 'log_db.php'; //dolacz plik z loginem do db
		
	$polaczenie = mysqli_connect( $host_db, $login_db, $haslo_db, $nazwa_db ); //polaczenie z bd
	
	if( !$polaczenie ) //jesli rozne od zera
	{
		echo "Błąd połączenia z bazą danych". mysqli_errno( $polaczenie );
	}
	else //to szukaj danych
	{
		if( isset( $_POST[ 'nazwa_prod' ] ) && isset( $_POST[ 'ilosc_szt'] ) && isset( $_POST[ 'cena_prod'] ))
		{
			$nazwa_prod =  $_POST[ 'nazwa_prod' ];
			$ilosc_szt = $_POST[ 'ilosc_szt' ];
			$cena_prod = $_POST[ 'cena_prod' ];
		
			$zapytanie = "UPDATE `produkt` SET `nazwa` = '$nazwa_prod', `cena` = '$cena_prod', `dost_szt` = '$ilosc_szt' WHERE `produkt`.`id`=".$_SESSION['id_edit'];
			mysqli_query( $polaczenie, $zapytanie ); //wyslanie zapytania sql
			header( 'Location: sklep.php' );
		}
		else
		{
			header( 'Location: sklep.php' );
		}
		
		mysqli_close( $polaczenie ); //zamkniecie polaczenia
	}
