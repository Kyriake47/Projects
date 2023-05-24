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
 
 

//tworzenie tabeli z danymi

  $sql = "CREATE TABLE IF NOT EXISTS data(
    Id_user INT,
    Name VARCHAR(30),
    Last_name VARCHAR(30),
    City VARCHAR(30),
    Zip_code VARCHAR(6),
    Street VARCHAR(60),
    Nr_h INT,
    Nr_f INT,
    Telephone VARCHAR(11),
FOREIGN KEY (Id_user) REFERENCES users(Id_user)
    )";

$res = $conn -> query($sql);


//dodawanie danych do tabeli dane

$sql = "UPDATE data 
SET 
Name=?,
Last_name=?,
City=?,
Zip_code=?,
Street=?,
Nr_h=?,
Nr_f=?,
Telephone=?
WHERE Id_user=$id_user;";
//(Id_user,Name,Last_name, City,Zip_code,Street, Nr_h,Nr_f, Telephone)
//VALUES ($id_user,?,?,?,?,?,?,?,?)";
$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,'sssssiis',$imie,$nazwisko,$miejscowosc,$kod_pocztowy,$ulica,$nr_domu,$nr_mieszkania,$telefon);
 
try{
  mysqli_stmt_execute($stmt);
  $res =  mysqli_stmt_get_result($stmt);
  }
  catch(Exception $e){
      echo "Bład dodawania danych do bazy<br>";
    }

?>

