<?php

require_once 'log_db.php'; //dolacz plik z loginem do db

$polaczenie = mysqli_connect( $host_db, $login_db, $haslo_db, "zmienne" ); //polaczenie z bd

if( !$polaczenie ) //jesli rozne od zera 
{
	echo "Błąd połączenia z bazą danych". mysqli_errno( $polaczenie );
}
else //to szukaj danych
{
	if( isset( $_POST[ 'haslo' ] ))
	{
		$haslo = $_POST[ 'haslo' ];
		$zapytanie = "INSERT INTO `wylacz_send`(`id`, `name`) VALUES ( 1 , '$haslo' )";
		mysqli_query( $polaczenie, $zapytanie ); //wyslanie zapytania sql
		echo json_encode( $do_wyslania = 1 );
	}
}
?>