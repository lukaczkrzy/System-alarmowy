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
	<title>Zarejestrowano</title>
</head>
<body>
	<h1> Dziękuję za rejestrację w aplikacji </h1>
	<br /><br /> Możesz już zalogować się na swoje konto!<br /><br />
	<a href="index.php">Zaloguj się na swoje konto!</a>
	
</body>
</html>
