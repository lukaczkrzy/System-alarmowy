<?php 

session_start();

if (isset($_SESSION['login'])) unset($_SESSION['login']);
if (isset($_SESSION['haslo'])) unset($_SESSION['haslo']);
if (isset($_SESSION['haslo1'])) unset($_SESSION['haslo1']);
if (isset($_SESSION['email'])) unset($_SESSION['email']);
if (isset($_SESSION['regulamin'])) unset($_SESSION['regulamin']);
if (isset($_SESSION['blad_login'])) unset($_SESSION['blad_login']);
if (isset($_SESSION['blad_haslo'])) unset($_SESSION['blad_haslo']);
if (isset($_SESSION['blad_email'])) unset($_SESSION['blad_email']);
if (isset($_SESSION['blad_regulamin'])) unset($_SESSION['blad_regulamin']);
if (isset($_SESSION['blad_capcha'])) unset($_SESSION['blad_capcha']);
if (isset($_SESSION['blad_uzytkownik'])) unset($_SESSION['blad_uzytkownik']);
if (isset($_SESSION['blad_haslo'])) unset($_SESSION['blad_haslo']);
if (isset($_SESSION['blad_uzytkownik_email'])) unset($_SESSION['blad_uzytkownik_email']);
?>

<!DOCTYPE html>
<html>
	<head>
	
		<meta charset="UTF-8">
		<title>Zarejestrowałes się</title>
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
				</div>
				
				<div class = "prawe_okno_text" >
					Dziękuję za rejestrację :) <br><br>
					Teraz możesz zalogować się na swoje konto.
				</div>
				
				<div class = "stopka" >					
					Domowe sytemy alarmowe 2016 &copy; Wszystkie prawa zastrzeżone. 
				</div>
			
			</div>
		
		</body>
</html>