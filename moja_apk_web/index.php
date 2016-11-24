<?php 

session_start();

if( isset( $_SESSION['zalogowano'] ) )
{
	header( 'Location: zalogowano.php' );
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Logowanie do aplikacji internetowej</title>
</head>
<body>
	<h1> Logowanie do aplikacji internetowej </h1>
	<form action="zaloguj.php" method="post">
	Podaj swój login: <input name = "login" type = "text" /><br><br>
	Podaj swoje hasło: <input name = "haslo" type = "password" /><br><br>
<?php 

if( isset( $_SESSION['blad_log']))
{
	echo $_SESSION['blad_log']."<br><br>";
	unset( $_SESSION['blad_log'] );
}


?>
	<input type = "submit" value="Zaloguj się" />
	</form>

	<br><a href = "rejestracja_form.php"> Zarejestruj się </a> <br><br>
	

	
</body>
</html>
