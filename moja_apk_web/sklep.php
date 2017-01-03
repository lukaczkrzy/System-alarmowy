
<?php 

session_start();

?>

<!DOCTYPE html>
<html>
	<head>
	
		<meta charset="UTF-8">
		<title>Sklep internetowy</title>
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
					<table>
						<?php 
							require_once 'log_db.php'; //dolacz plik z loginem do db
							
							$polaczenie = mysqli_connect( $host_db, $login_db, $haslo_db, $nazwa_db ); //polaczenie z bd
							
							if( !$polaczenie ) //jesli rozne od zera
							{
								echo "Błąd połączenia z bazą danych". mysqli_errno( $polaczenie );
							}
							else //to szukaj danych
							{
								$zapytanie = "SELECT * FROM produkt";
								$szukaj = mysqli_query( $polaczenie, $zapytanie ); //wyslanie zapytania sql
								$ilosc_produktow = mysqli_num_rows( $szukaj ); //zwraca liczbe produktow
								
								if( $ilosc_produktow != 0 )
								{
									echo '<tr>
											<th> Nazwa produktu </th>
											<th> Ilość dostępnych sztuk </th>
											<th> Cena jednej sztuki </th>
										  </tr>';
									
									$produkty = mysqli_fetch_assoc( $szukaj ); //tablica skojarzona z nazwami kolumn w db
									
									$i = 0; //wyswietlanie wszystkich produktow
									
									while ( $i < $ilosc_produktow ) //wyswietlanie wszystkich produktow w db
									{
										echo '<tr>';
											echo '<td>'. $produkty[ 'nazwa' ] .' </td>';
											echo '<td>'. $produkty[ 'dost_szt' ] .'szt. </td>';
											echo '<td>'. $produkty[ 'cena' ] .'PLN </td>';
										
												echo '<tr>';
													echo '<td colspan = "3" >';
														if( isset( $_SESSION['admin_zalogowany'] ) )
														{
															echo '<div class = "przyciski_sklep" >';		
																echo '<a href = "dodaj_produkt.php" class = "przycisk_link" > Dodaj produkt </a>'; 
															echo '</div>';
															echo '<div class = "przyciski_sklep" >';
																echo '<a href = "edytuj_produkt" class = "przycisk_link" > Edytuj produkt </a>';
															echo '</div>';
															echo '<div class = "przyciski_sklep" >';
																echo '<a href = "usun_produkt.php" class = "przycisk_link" > Usuń produkt </a>';
															echo '</div>';
														}
														else
														{
															echo '<div class = "przyciski_sklep" >';
																echo '<a href = "dodaj_koszyk.php" class = "przycisk_link" > Dodaj do koszyka </a>';
																echo '</div>';
														  echo '</td>';
														}
												echo '</tr>';
										
										echo '</tr>'; 
										$i++;
									}
								}
								else 
								{
									echo '<p style = "color: red"> Brak produktow w bazie danych! <br><br></p>';
									if( isset( $_SESSION['admin_zalogowany'] ) )
									{
										echo '<div class = "przyciski_sklep" >';
											echo '<a href = "dodaj_produkt.php" class = "przycisk_link" > Dodaj produkt </a>';
										echo '</div>';
										echo '<div class = "przyciski_sklep" >';
											echo '<a href = "edytuj_produkt" class = "przycisk_link" > Edytuj produkt </a>';
										echo '</div>';
										echo '<div class = "przyciski_sklep" >';
											echo '<a href = "usun_produkt.php" class = "przycisk_link" > Usuń produkt </a>';
										echo '</div>';
									}
								}
							}
						?>
					</table>
				</div>
				
				<div class = "stopka" >					
					Domowe sytemy alarmowe 2016 &copy; Wszystkie prawa zastrzeżone. 
				</div>
			
			</div>
		
		</body>
</html>