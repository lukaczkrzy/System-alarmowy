<?php

	session_start();
	
	require_once 'log_db.php'; //dolacz plik z loginem do db
	
	$polaczenie = mysqli_connect( $host_db, $login_db, $haslo_db, $nazwa_db ); //polaczenie z bd
	
	$usun = $_GET[ 'usun' ];
	
	$zapytanie = "DELETE FROM `produkt` WHERE `produkt`.`id` = ".$usun;
	
	mysqli_query( $polaczenie, $zapytanie ); //wyslanie zapytania sql
	
	$_SESSION[ 'usunieto' ] = "Produkt został usunięty z bazy danych.";
	
	header( 'Location: sklep.php' );
	
	mysqli_close( $polaczenie ); //zamkniecie polaczenia

