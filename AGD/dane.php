<?php
include("polaczenie.php");
//obieranie danych z formularza i zapisywanie ich w tabeli data pod właściwym id 
//pobieranie danych z tabeli data z właściwego id i wpisywanie danych do formularza
$email = mysqli_real_escape_string($conn,$_POST["email"]);
$login = mysqli_real_escape_string($conn,$_POST["login"]);
	$haslo = mysqli_real_escape_string($conn,$_POST["password"]);



?>