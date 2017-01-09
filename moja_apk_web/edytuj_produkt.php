
<?php

session_start();

?>

<!DOCTYPE html>
<html>
	<head>
	
		<meta charset="UTF-8">
		<title>Strona główna</title>
		<link rel = "stylesheet" href = "styl_strony.css" type = "text/css" >
		<link href = "https://fonts.googleapis.com/css?family=Lato" rel = "stylesheet" >
		<link href = "https://fonts.googleapis.com/css?family=Exo:900" rel = "stylesheet">
		
	</head>
	
		<body>
			
			<div class = "okno_glowne" >
			
				<div class = "logo" >
					Domowe systemy alarmowe
				</div>
				
				<div class = "top_okno" >
					Bezpieczeństwo to jedna z najbardziej cenionych wartości w życiu człowieka. <br>
					Chcemy chronić siebie, swoich bliskich oraz nasze mienie.
				</div>
				
				<?php
					if( !isset( $_SESSION[ 'zalogowano' ] ) )
					{
						echo '<div class = "formularz" >';
						echo 	'<div class = "przyciski" >';
						echo		'<a href = "formularz_logowania.php" class = "przycisk_link" > Zaloguj się </a>';
						echo	'</div>';
						echo	'<div class = "przyciski" >';
						echo		'<a href = "rejestracja_form.php " class = "przycisk_link" > Zarejestruj się </a>';
						echo	'</div>';
						echo '</div>';
						
					}
					else 
					{
						echo '<div class = "formularz" >';
						echo 	'Witaj '.$_SESSION[ 'login' ];
						echo 	'<div class = "przyciski" >';
						echo		'<a href = "wyloguj.php" class = "przycisk_link" > Wyloguj się </a>';
						echo	'</div>';
						echo '</div>';
					}
				?>
					
				<div class = "lewe_okno_menu" >	
					<div class = "przyciski" > 		
						<a href = "index.php" class = "przycisk_link" > Strona główna </a> 
					</div>
					<div class = "przyciski" > 
						<a href = "o_nas.php" class = "przycisk_link" > O nas </a>
					</div>
					<div class = "przyciski" >  
						<a href = "opis_alarmu.php" class = "przycisk_link" > Opis systemu alarmowego </a>
					</div> 
					<div class = "przyciski" > 
						<a href = "sklep.php" class = "przycisk_link" > Sklep </a>
					</div>
					<div class = "przyciski" > 
						<a href = "kontakt.php" class = "przycisk_link" > Kontakt </a> 
					</div>
				</div>
				
				<div class = "prawe_okno_text" >
					<div class = "pole_input" >
						<form action = "aktualizuj_produkt.php" method="post" >
							
							<?php 
								
							require_once 'log_db.php'; //dolacz plik z loginem do db
							
							$_SESSION[ 'id_edit' ] = $_GET[ 'edytuj' ];
								
							$polaczenie = mysqli_connect( $host_db, $login_db, $haslo_db, $nazwa_db ); //polaczenie z bd
								
							if( !$polaczenie ) //jesli rozne od zera
							{
								echo "Błąd połączenia z bazą danych". mysqli_errno( $polaczenie );
							}
							else //to szukaj danych
							{
								$zapytanie = "SELECT * FROM `produkt` WHERE `id` = ".$_SESSION[ 'id_edit' ];
								$szukaj = mysqli_query( $polaczenie, $zapytanie ); //wyslanie zapytania sql
								$produkty = mysqli_fetch_assoc( $szukaj ); //tablica skojarzona z nazwami kolumn w d	
											
							
							echo 'Nazwa nowego produktu: <input name = "nazwa_prod" type = "text" value = "'.$produkty[ 'nazwa' ].'" > 
								Ilość dostępnych sztuk: <input name = "ilosc_szt" type = "number" value = "'.$produkty[ 'dost_szt' ].'" >
								Cena jednej sztuki produktu: <input name = "cena_prod" type = "number" value = "'.$produkty[ 'cena' ].'" >
								<input type = "submit" value = "Zapisz produkt" >
								<input type = "reset" value = "Resetuj pola formularza" >';
							}
							
							mysqli_close( $polaczenie ); //zamkniecie polaczenia
							
							?>
						</form>
					</div>
				</div>
				
				<div class = "stopka" >					
					Domowe sytemy alarmowe 2016 &copy; Wszystkie prawa zastrzeżone. 
				</div>
			
			</div>
		
		</body>
</html>