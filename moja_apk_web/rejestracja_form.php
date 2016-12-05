<?php 

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Rejestracja do aplikacji internetowej</title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<h1> Rejestracja do aplikacji internetowej </h1>
	<form method="post" action = "rejestracja.php" >
	Podaj nowy login: <input name = "login" type = "text" /><br><br>
<?php 

	if( isset( $_SESSION['blad_login'] ) )
	{
		echo $_SESSION['blad_login'].'<br><br>';
		unset( $_SESSION['blad_login'] );
	}
	
	if(isset( $_SESSION['blad_uzytkownik'] ) )
	{
		echo $_SESSION['blad_uzytkownik'].'<br><br>';
		unset( $_SESSION['blad_uzytkownik'] );
	}
	
?>
	Podaj swoje hasło: <input name = "haslo" type = "password" /><br><br>
<?php 
	if( isset( $_SESSION['blad_haslo'] ) )
	{
		echo $_SESSION['blad_haslo'].'<br><br>';
		unset( $_SESSION['blad_haslo'] );
	}
?>	
	Powtórz swoje hasło: <input name = "haslo1" type = "password" /><br><br>
	Podaj swój email: <input name = "email" type = "email" /><br><br>
<?php 
	if(isset( $_SESSION['blad_uzytkownik_email'] ) )
	{
		echo $_SESSION['blad_uzytkownik_email'].'<br><br>';
		unset( $_SESSION['blad_uzytkownik_email'] );
	}

?>
	<label>
		<input name = "regulamin" type = "checkbox"> Akceptuję regulamin<br><br>
	</label>
<?php 

	if( isset( $_SESSION['blad_regulamin'] ) )
	{
		echo $_SESSION['blad_regulamin'].'<br><br>';
		unset( $_SESSION['blad_regulamin'] );
	}
?>	
	<div class="g-recaptcha" data-sitekey="6LeFWAoUAAAAAFjgMiW0c1ukJCa6czsx1DFBbL14"></div>
<?php 

	if( isset( $_SESSION['blad_captcha'] ) )
	{
		echo $_SESSION['blad_captcha'].'<br><br>';
		unset( $_SESSION['blad_captcha'] );
	}
?>	
	<br><input type = "submit" value="Zarejestruj się" />
	<br> <br><a href = "index.php"> Wróć do strony logowania. </a> <br><br>
	</form>
</body>
</html>