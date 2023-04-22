<?php

echo "Połączenie z bazą...";

define("HOST", "localhost");
define("DBUSER", "uagd");
define("DBPASS", "pagd");
define("DBNAME", "AGD");

$conn = new mysqli(HOST, DBUSER, DBPASS, DBNAME);

if (mysqli_connect_errno() != 0){
	echo "Błąd połączenia z bazą danych!";
	die();
}
