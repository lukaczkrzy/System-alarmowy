
<?php 

session_start();

?>

<!DOCTYPE html>
<html>
	<head>
	
		<meta charset="UTF-8">
		<title>O nas</title>
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
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent venenatis dolor ut urna lobortis, sit amet feugiat elit pulvinar. Curabitur laoreet enim ligula, at gravida arcu pharetra non. Mauris ipsum diam, blandit ut vestibulum id, sollicitudin suscipit leo. Cras ut neque id nibh pellentesque faucibus. Nulla viverra quam in sodales eleifend. In hendrerit non eros eu rhoncus. Nam pulvinar dolor vel aliquam aliquam. Cras vitae lorem commodo, sollicitudin augue nec, ullamcorper libero. Cras ultricies venenatis consequat. Nunc vel posuere sem. Sed consequat felis massa, at ornare nisl feugiat at.
					<br> <br>
					Etiam vel cursus tellus, vitae luctus justo. Integer condimentum, ligula dictum rhoncus varius, tellus turpis congue nisl, non egestas urna nisl nec eros. Morbi ac condimentum velit. Nam pretium tempus tristique. Quisque eget neque et ante aliquet interdum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent consectetur tellus quis leo condimentum aliquet. Donec et ullamcorper turpis. Sed nec mi ac eros bibendum lacinia eu non nulla. Nullam quis enim dolor. Duis ac mollis sapien, at eleifend sapien. Mauris quam velit, ornare eget pellentesque at, porta vitae lorem. Nam ultricies neque sapien, et auctor tellus mollis nec. Praesent non felis vitae augue malesuada laoreet a dapibus lorem. Suspendisse convallis ipsum ac orci lobortis bibendum sed a justo. Ut et magna mi.
					<br> <br>
					Vestibulum tempor dignissim mauris, id vestibulum augue imperdiet sit amet. Praesent rutrum rhoncus urna, non condimentum eros pretium id. Aenean libero augue, fringilla vitae vestibulum nec, posuere lacinia lectus. Phasellus iaculis porta lacus non hendrerit. Suspendisse suscipit laoreet mi non faucibus. Suspendisse a libero viverra mi cursus ullamcorper ut eget arcu. Vivamus varius, odio quis interdum pharetra, libero libero fermentum sem, in sollicitudin ipsum quam et ex. Nulla finibus porttitor mauris a ultricies. Nullam porttitor efficitur auctor.
					<br> <br>
					Fusce pulvinar neque libero. Cras tristique neque quis mi ultrices, at gravida lectus vehicula. Phasellus at pharetra sem, commodo convallis dolor. Phasellus nunc turpis, facilisis nec leo et, lobortis luctus sem. Curabitur ac nisi ac purus convallis fringilla. Maecenas ut diam in felis volutpat pretium a eu ante. Sed accumsan purus ut magna semper, ut fermentum sem hendrerit. Suspendisse arcu velit, posuere ut leo vel, facilisis maximus massa. Praesent pellentesque justo ut hendrerit aliquam. Vivamus quis tellus ut erat feugiat tincidunt sit amet et neque. Etiam vulputate ipsum ut ipsum cursus, vel vestibulum diam sollicitudin. In gravida nulla id enim lobortis, vel eleifend metus dictum.
					<br> <br>
					Curabitur faucibus mi turpis. Suspendisse congue tellus ut risus imperdiet imperdiet. Curabitur at eros malesuada, iaculis ipsum laoreet, tristique nisl. Nullam pellentesque gravida neque eu blandit. Praesent sed erat fringilla, ultricies lacus sed, ullamcorper ex. Morbi eget euismod quam, eu tristique neque. Phasellus sagittis est id felis iaculis, et finibus urna iaculis. Nulla semper, quam in semper sodales, leo est cursus elit, id fermentum massa nibh et diam. In dolor tortor, ultrices ut sollicitudin at, suscipit et nunc. Curabitur accumsan nisi vitae dui dignissim, et egestas risus maximus. Integer in aliquam lorem. Phasellus facilisis justo blandit eleifend malesuada. Sed vel dapibus lorem, id volutpat leo. Nam lobortis ante non urna tristique scelerisque. Integer convallis et diam nec interdum.
				</div>
				
				<div class = "stopka" >					
					Domowe sytemy alarmowe 2016 &copy; Wszystkie prawa zastrzeżone. 
				</div>
			
			</div>
		
		</body>
</html>