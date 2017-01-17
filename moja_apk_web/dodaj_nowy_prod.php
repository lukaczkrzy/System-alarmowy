<?php

session_start();

require_once 'log_db.php'; //dolacz plik z loginem do db

$polaczenie = mysqli_connect( $host_db, $login_db, $haslo_db, $nazwa_db ); //polaczenie z bd

if( isset( $_POST[ 'nazwa_prod' ] ) && isset( $_POST[ 'ilosc_szt'] ) && isset( $_POST[ 'cena_prod'] ))
{
	$nazwa_prod =  $_POST[ 'nazwa_prod' ];
	$ilosc_szt = $_POST[ 'ilosc_szt' ];
	$cena_prod = $_POST[ 'cena_prod' ];
	
	$zapytanie = "INSERT INTO `produkt`(`nazwa`, `cena`, `dost_szt`) VALUES ('$nazwa_prod',
						 '$cena_prod','$ilosc_szt') ";
	mysqli_query( $polaczenie, $zapytanie ); //wyslanie zapytania sql
	$_SESSION[ 'add_produkt' ] = '<p style = "color: green"> Produkt dodano do bazy danych! <br><br></p>';
	header( 'Location: dodaj_produkt.php' );
}
else 
{
	$_SESSION[ 'blad_form_prod' ] = '<p style = "color: red"> Wypełnij pola formularza! <br><br></p>';
	header( 'Location: dodaj_produkt.php' );
}

mysqli_close( $polaczenie ); //zamkniecie polaczenia