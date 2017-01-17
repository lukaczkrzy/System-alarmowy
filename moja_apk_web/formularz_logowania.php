
<?php 

session_start();

?>


<!DOCTYPE html>
<html>
	<head>
	
		<meta charset="UTF-8">
		<title>Kontakt z administratorem</title>
		<link rel = "stylesheet" href = "styl_strony.css" type = "text/css" >
		<link href = "https://fonts.googleapis.com/css?family=Lato" rel = "stylesheet" >
		<link href = "https://fonts.googleapis.com/css?family=Exo:900" rel = "stylesheet">
		
	</head>
	
		<body>
			
			<div class = okno_glowne >
			
				<div class = "logo" >
					Domowe systemy alarmowe
				</div>
			 
				<div class = "top_okno" >
					Bezpieczeństwo to jedna z najbardziej cenionych wartości w życiu człowieka. <br>
					Chcemy chronić siebie, swoich bliskich oraz nasze mienie.
    			</div>
    			
    			<div class = "formularz" >
					<div class = "przyciski" > 
						<a href = "formularz_logowania.php" class = "przycisk_link" > Zaloguj się </a>
					</div>
					<div class = "przyciski" >
						<a href = "rejestracja_form.php " class = "przycisk_link" > Zarejestruj się </a>
					</div>
				</div>	
				
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
					<div class = "pole_input" >
						<form action="zaloguj.php" method="post" >
							
							<?php
								if( isset( $_SESSION[ 'blad_log'] ) )
								{
									echo $_SESSION[ 'blad_log' ];
									unset( $_SESSION[ 'blad_log' ] );
								}
							?>
							
							Podaj swój login: <input name = "login" type = "text" > 
							Podaj swoje hasło: <input name = "haslo" type = "password" >
							<input type = "submit" value = "Zaloguj się" >
							<input type = "reset" value = "Resetuj pola formularza" >
						</form>
					</div>
				</div>
				
				<div class = "stopka" >					
					Domowe sytemy alarmowe 2016 &copy; Wszystkie prawa zastrzeżone. 
				</div>
			
			</div>
		
		</body>
</html>