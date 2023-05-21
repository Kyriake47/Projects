<?php
session_start();
include("polaczenie.php");

$imie = mysqli_real_escape_string($conn,$_POST["name"]);
  $nazwisko = mysqli_real_escape_string($conn,$_POST["last_name"]);
  $miejscowosc = mysqli_real_escape_string($conn,$_POST["city"]);
  $kod_pocztowy = mysqli_real_escape_string($conn,$_POST["zip_code"]);
  $nr_domu = mysqli_real_escape_string($conn,$_POST["nr_h"]);
  $nr_mieszkania = mysqli_real_escape_string($conn,$_POST["nr_f"]);
  $telefon = mysqli_real_escape_string($conn,$_POST["phone_nr"]);
  $typ = mysqli_real_escape_string($conn,$_POST["type"]);
  $model = mysqli_real_escape_string($conn,$_POST["model"]);
  $data = mysqli_real_escape_string($conn,$_POST["date"]);

  $sql = "CREATE TABLE orders IF NOT EXISTS VALUES(
    Id_order INT AUTO_INCREMENT PRIMARY KEY UNIQUE,
    Id_user INT,
    Name VARCHAR(30),
    Last_name VARCHAR(30),
    City VARCHA(30),
    Zip_code VARCHAR(6),
    Street VARCHAR(60),
    Nr_h INT,
    Nr_f INT,
    Telephone VARCHAR(11)
FOREIGN KEY (Id_user) REFERENCES users(Id_user)
    )";

$res = $conn -> query($sql);


 
?>