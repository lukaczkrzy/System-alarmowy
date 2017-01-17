
<?php

session_start();

?>

<!DOCTYPE html>
<html>
	<head>
	
		<meta charset="UTF-8">
		<title>Alarm</title>
		<link rel = "stylesheet" href = "styl_strony.css" type = "text/css" >
		<link href = "https://fonts.googleapis.com/css?family=Lato" rel = "stylesheet" >
		<link href = "https://fonts.googleapis.com/css?family=Exo:900" rel = "stylesheet">
		<script type="text/javascript" src = "jquery-3.1.1.js" > </script>
		
		<script type="text/javascript">

		$( document ).ready
		(
			function()
			{
				$( "#uzbroj" ).click
				( 
					function()
					{
						$( "#div_uzbroj" ).toggle( "slow" );
					}
				);
				$( "#rozbroj" ).click
				(
					function()
					{
						$( "#div_rozbroj" ).toggle( "slow" );
					}
				);
				$( "#wlacz" ).click
				(
					function()
					{
						$( "#div_wlacz" ).toggle( "slow" );
					}
				);
				$( "#wylacz" ).click
				(
					function()
					{
						$( "#div_wylącz" ).toggle( "slow" );
					}
				);
				$( "#zmien" ).click
				(
					function()
					{
						$( "#div_zmien" ).toggle( "slow" );
					}
				);
				$( "#form_uzbroj" ).click
				(
					function( event )
					{
						var haslo = $( 'input[name=haslo]' ).val();
						var wyslij_haslo = 'haslo=' + haslo;
						$.ajax
						({
								url: "uzbroj.php",
								type : "post",
								dataType: "json",
								data : wyslij_haslo,
								success: function() { alert( "Alarm został uzbrojony" ); },
								error: function() { alert( "Wystąpił błąd, alarm nie został uzbrojony" ); }
						});
						event.preventDefault();
					}
				);
				$( "#form_rozbroj" ).click
				(
					function( event )
					{
						var haslo = $( 'input[name=haslo_1]' ).val();
						var wyslij_haslo = 'haslo=' + haslo;
						$.ajax
						({
								url: "rozbroj.php",
								type : "post",
								dataType: "json",
								data : wyslij_haslo,
								success: function() { alert( "Alarm został rozbrojony" ); },
								error: function() { alert( "Wystąpił błąd, alarm nie został rozbrojony" ); }
						});
						event.preventDefault();
					}
				);
				$( "#form_wlacz" ).click
				(
					function( event )
					{
						var haslo = $( 'input[name=haslo_2]' ).val();
						var wyslij_haslo = 'haslo=' + haslo;;
						$.ajax
						({
								url: "wlacz.php",
								type : "post",
								dataType: "json",
								data : wyslij_haslo,
								success: function() { alert( "Alarm został włączony" ); },
								error: function() { alert( "Wystąpił błąd, alarm nie został włączony" ); }
						});
						event.preventDefault();
					}
				);
				$( "#form_wylacz" ).click
				(
					function( event )
					{
						var haslo = $( 'input[name=haslo_3]' ).val();
						var wyslij_haslo = 'haslo=' + haslo;
						$.ajax
						({
								url: "wylacz.php",
								type : "post",
								dataType: "json",
								data : wyslij_haslo,
								success: function() { alert( "Alarm został wyłączony" ); },
								error: function() { alert( "Wystąpił błąd, alarm nie został uzbrojony" ); }
						});
						event.preventDefault();
					}
				);
				$( "#form_zmien" ).click
				(
					function( event )
					{
						var haslo = $( 'input[name=haslo_4]' ).val();
						var wyslij_haslo = 'haslo=' + haslo;
						$.ajax
						({
								url: "zmien.php",
								type : "post",
								dataType: "json",
								data : wyslij_haslo,
								success: function( zmiana_hasla ) { alert( "Podaj nowe hasło" ); },
								error: function() { alert( "Wystąpił błąd, hasło nie zostało zmienione" ); }
						});
						event.preventDefault();
					}
				);
			}
		);
		</script>
		
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
				<table>
					<tr>
						<td colspan = "3" >
							<div class = "przyciski_sklep" > 	
								<div id = "uzbroj" >
									<a href = "#" class = "przycisk_link" > Uzbrój </a> 
								</div>	
							</div>
								<div class = "przyciski_sklep" > 
									<div id = "rozbroj" >
										<a href = "#" class = "przycisk_link" > Rozbrój </a>
									</div>
								</div>
							<div class = "przyciski_sklep" >  
								<div id = "wlacz" >
									<a href = "#" class = "przycisk_link" > Włącz </a>
								</div>
							</div> 
							<div class = "przyciski_sklep" > 
								<div id = "wylacz" >
									<a href = "#" class = "przycisk_link" > Wyłącz </a>
								</div>
							</div>
							<div class = "przyciski_sklep" > 
								<div id = "zmien" >
									<a href = "#" class = "przycisk_link" > Zmień hasło </a>
								</div>
							</div>
						</td>
					</tr>
				</table>
				
					<div id = "div_uzbroj" style = "display : none" >
						<br>Aby uzbroić alarm podaj hasło <br><br>
						<div class = "pole_input" >
						<form method = "post" >
							<input name = "haslo" type = "number" > 
							<input type = "submit" value = "Uzbrój" id = "form_uzbroj" >
							<input type = "reset" value = "Resetuj pola formularza" >
						</form>
						</div>
					</div>
					
					<div id = "div_rozbroj" style = "display : none" >
						<br>Aby rozbroić alarm podaj hasło <br><br>
						<?php
							if( isset( $_SESSION[ 'haslo' ]))
							{
								echo $_SESSION[ 'haslo' ];
								unset( $_SESSION[ 'haslo' ] );
							}
						?>
						<div class = "pole_input" >
						<form method="post" >
							<input name = "haslo_1" type = "number" > 
							<input type = "submit" value = "Rozbrój" id = "form_rozbroj" >
							<input type = "reset" value = "Resetuj pola formularza" >
						</form>
						</div>
					</div>
					
					<div id = "div_wlacz" style = "display : none" >
						<br>Aby włączyć alarm podaj hasło <br><br>
						<div class = "pole_input" >
						<form method="post" >
							<input name = "haslo_2" type = "number" > 
							<input type = "submit" value = "Włącz" id = "form_wlacz" >
							<input type = "reset" value = "Resetuj pola formularza" >
						</form>
						</div>
					</div>
					
					<div id = "div_wylącz" style = "display : none" >
						<br>Aby wyłączyć alarm podaj hasło <br><br>
						<div class = "pole_input" >
						<form method="post" >
							<input name = "haslo_3" type = "text" > 
							<input type = "submit" value = "Wyłącz" id = "form_wylacz" >
							<input type = "reset" value = "Resetuj pola formularza" >
						</form>
						</div>
					</div>
					
					<div id = "div_zmien" style = "display : none" >
						<br>Aby zmienić hasło podaj hasło <br><br>
						<div class = "pole_input" >
						<form method="post" >
							<input name = "haslo_4" type = "number" > 
							<input type = "submit" value = "Zmień hasło" id = "form_zmien" >
							<input type = "reset" value = "Resetuj pola formularza" >
						</form>
						</div>
					</div>
					
				</div>
				<div class = "stopka" >					
					Domowe sytemy alarmowe 2016 &copy; Wszystkie prawa zastrzeżone. 
				</div>
			</div>
		
		</body>
</html>
