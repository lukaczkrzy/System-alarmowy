
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
						<a href = "dodaj_koszyk.php" class = "przycisk_link" > Koszyk </a>
					</div>
					<div class = "przyciski" > 
						<a href = "kontakt.php" class = "przycisk_link" > Kontakt </a> 
					</div>
					<?php 
						
						if( isset( $_SESSION['admin_zalogowany'] ) )
						{
							echo '<div class = "przyciski" >
									<a href = "alarm.php" class = "przycisk_link" > Alarm </a>
								 </div>';
						}
					?>
				</div>
				
				<div class = "prawe_okno_text" >
					
					<?php
					if( isset( $_GET[ 'koszyk' ] ) )
					{
						$id_produktu = $_GET[ 'koszyk' ];
														
						require_once 'log_db.php'; //dolacz plik z loginem do db
							
						$polaczenie = mysqli_connect( $host_db, $login_db, $haslo_db, $nazwa_db ); //polaczenie z bd
							
						if( !$polaczenie ) //jesli rozne od zera
						{
							echo "Błąd połączenia z bazą danych". mysqli_errno( $polaczenie );
						}
						else //to szukaj danych
						{
							$zapytanie = "SELECT * FROM `produkt` WHERE `id` = ".$id_produktu;
							$szukaj = mysqli_query( $polaczenie, $zapytanie ); //wyslanie zapytania sql
							$produkty = mysqli_fetch_assoc( $szukaj ); //tablica skojarzona z nazwami kolumn w d
							
							$_SESSION[ 'koszyk' ][] = array( 'id_produktu' => $id_produktu, 'nazwa' => $produkty[ 'nazwa' ] , 
															'cena' => $produkty[ 'cena' ] , 'dos_szt' => $produkty[ 'dost_szt' ]  );
							
							echo 'Zawartość Twojego koszyka <br><br>';
							
							foreach ( $_SESSION[ 'koszyk' ] as $produkt )
							{
								echo  "Nazwa:".$produkt[ 'nazwa' ]."  |  Dostępna liczba szt.: ".$produkt[ 'dos_szt' ]."  |  Cena produktu: "
										.$produkt[ 'cena' ]."<br>";
								echo '<br>';
							}
							if( isset( $_SESSION[ 'zalogowano' ] ) )
							{
								echo '<div class = "przyciski_sklep" >';
									echo '<a href = "zamowienie.php" class = "przycisk_link" > Zamów produkty </a>';
								echo '</div>';
							}
							echo '<div class = "przyciski_sklep" >';
								echo '<a href = "czysc_koszyk.php" class = "przycisk_link" > Czyść koszyk </a>';
							echo '</div>';
							echo '<br><br><br>';
						}
						mysqli_close( $polaczenie ); //zamkniecie polaczenia
					}
					else
					{	
							echo 'Zawartość Twojego koszyka <br><br>';
							
							if( isset( $_SESSION[ 'koszyk' ] ) )
								foreach ( $_SESSION[ 'koszyk' ] as $produkt )
								{
									echo  "Nazwa:".$produkt[ 'nazwa' ]."  |  Dostępna liczba szt.: ".$produkt[ 'dos_szt' ]."  |  Cena produktu: "
											.$produkt[ 'cena' ]."<br>";
											echo '<br>';
								}
							else 
							{
								echo 'Koszyk pusty<br><br>';
							}
							if( isset( $_SESSION[ 'zalogowano' ] ) )
							{
								echo '<div class = "przyciski_sklep" >';
								echo '<a href = "zamowienie.php" class = "przycisk_link" > Zamów produkty </a>';
								echo '</div>';
							}
							echo '<div class = "przyciski_sklep" >';
							echo '<a href = "czysc_koszyk.php" class = "przycisk_link" > Czyść koszyk </a>';
							echo '</div>';
							echo '<br><br><br>';
						
					}
						
					?>
					
				</div>
				
				<div class = "stopka" >					
					Domowe sytemy alarmowe 2016 &copy; Wszystkie prawa zastrzeżone. 
				</div>
			
			</div>
		
		</body>
</html>