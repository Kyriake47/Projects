<?php
session_start();
include("polaczenie.php");

//zmienne

 $id_user=$_SESSION["userId"];
$imie = mysqli_real_escape_string($conn,$_POST["name"]);
  $nazwisko = mysqli_real_escape_string($conn,$_POST["last_name"]);
  $miejscowosc = mysqli_real_escape_string($conn,$_POST["city"]);
  $kod_pocztowy = mysqli_real_escape_string($conn,$_POST["zip_code"]);
  $ulica = mysqli_real_escape_string($conn,$_POST["street"]);
  $nr_domu = mysqli_real_escape_string($conn,$_POST["nr_h"]);
  $nr_mieszkania = mysqli_real_escape_string($conn,$_POST["nr_f"]);
  $telefon = mysqli_real_escape_string($conn,$_POST["phone_nr"]);
  $typ = mysqli_real_escape_string($conn,$_POST["type"]);
  $model = mysqli_real_escape_string($conn,$_POST["model"]);
  $info=mysqli_real_escape_string($conn,$_POST["info"]);
  $data = mysqli_real_escape_string($conn,$_POST["date"]);
 
  
 

//tworzenie tabeli z zamówieniami

  $sql = "CREATE TABLE IF NOT EXISTS orders(
    Id_order INT AUTO_INCREMENT PRIMARY KEY UNIQUE,
    Id_user INT,
    Name VARCHAR(30),
    Last_name VARCHAR(30),
    City VARCHAR(30),
    Zip_code VARCHAR(6),
    Street VARCHAR(60),
    Nr_h INT,
    Nr_f INT,
    Telephone VARCHAR(11),
    Type VARCHAR(50),
    Model VARCHAR(50),
    Info TEXT,
    Data DATE,
FOREIGN KEY (Id_user) REFERENCES users(Id_user)
    )";

$res = $conn -> query($sql);

//dodawanie danych do tabeli zamowienia

$sql = "INSERT INTO orders (Id_order,Id_user,Name,Last_name, City,Zip_code,Street, Nr_h,Nr_f,Telephone,Type,Model,Info,Data)
VALUES (NULL,$id_user,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,'sssssiisssss',$imie,$nazwisko,$miejscowosc,$kod_pocztowy,$ulica,$nr_domu,$nr_mieszkania,$telefon,$typ,$model,$info,$data);
 
try{
  mysqli_stmt_execute($stmt);
  $res =  mysqli_stmt_get_result($stmt);
  }
  catch(Exception $e){
      echo "Bład dodawania zamówienia do bazy<br>";
    }

?>