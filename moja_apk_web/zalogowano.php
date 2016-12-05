<?php

session_start();

if( isset( $_SESSION['zalogowano']) )
{
	require_once 'log_db.php';
	$polaczenie = mysqli_connect( $host_db, $login_db, $haslo_db, $nazwa_db );
	
	$data = date('H:i:s d-m-Y ');
	$query = "UPDATE `dane_uzytkownikow` SET `data_logowania` = '.$data.' WHERE `dane_uzytkownikow`.`id` =".$_SESSION['id_uzytkow'];
	
	mysqli_query( $polaczenie, $query );//wyslanie zapytania sql
	
	echo "<h1> Jestes zalogowany w serwisie jako ".$_SESSION['login']." </h1>";
	echo "<br> Twój adres email to: ".$_SESSION['email'];
	echo "<br><br> Ostatnio logowałes się o godzine :".$_SESSION['godz_logowania'];
	echo "<br><br> Adres IP jaki posiadasz to: ".$_SESSION['ip'];

	echo '<br><br /><a href="wyloguj.php">Wyloguj się</a>';
	
	mysqli_close( $polaczenie ); //zamkniecie polaczenia
}
else 
	header( 'Location: index.php' );

if( isset( $_SESSION['ip'])) unset( $_SESSION['ip'] );
if( isset( $_SESSION['godz_logowania'])) unset( $_SESSION['godz_logowania'] );
if( isset( $_SESSION['email'])) unset( $_SESSION['email'] );
if( isset( $_SESSION['login'])) unset( $_SESSION['login'] );
if( isset( $_SESSION['id_uzytkow'])) unset( $_SESSION['id_uzytkow'] );
?>
	
