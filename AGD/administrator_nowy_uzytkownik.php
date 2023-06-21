<?php
include("polaczenie.php");
$status=0;

$email = mysqli_real_escape_string($conn,$_POST["email"]);
$login = mysqli_real_escape_string($conn,$_POST["login"]);
$haslo = mysqli_real_escape_string($conn,$_POST["password"]);
$funkcja=mysqli_real_escape_string($conn,$_POST["function"]);
$hash_haslo=password_hash($haslo,PASSWORD_DEFAULT);


try{
$sql = "INSERT INTO Users (Login,Password,Email,Function)
VALUES (?,?,?,?)";

$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,'ssss',$login,$hash_haslo,$email,$funkcja);
mysqli_stmt_execute($stmt);
    $res =  mysqli_stmt_get_result($stmt);
    $status=1;

}
catch(Exception $e){
  echo "Bład utworzenia użytkownika(możliwwe powtózenie loginu)<br>";
  $status=5;
}








      try{
      $sql = "SELECT Id_user FROM users
  WHERE Login=\"".$login."\" ;";
  echo($sql);
      $res = $conn -> query($sql);
      $row=mysqli_fetch_array($res);
      $id_user=$row[0];
      $status=1;
      }catch(Exception $e){

        echo "Błąd wyszukiwania uzytkownaika po id";
        $status=5;
      }
      
      
      try{
//usunac blad z nieznana kolumna, dodac wylogowywanie,zrobic dodawanie dat
      $sql = "INSERT INTO Data(Id_user, Name, Last_name, City, Zip_code, Street, Nr_h, Nr_f, Telephone)
      VALUES ($id_user,'','','','','','','','')";
       $res = $conn -> query($sql);
       $status=1;
      }catch(Exception $e){
        echo "Błąd dodawania wiersza w tabeli data";
$status=5;

      }

$imie = mysqli_real_escape_string($conn,$_POST["name"]);
  $nazwisko = mysqli_real_escape_string($conn,$_POST["last_name"]);
  $miejscowosc = mysqli_real_escape_string($conn,$_POST["city"]);
  $kod_pocztowy = mysqli_real_escape_string($conn,$_POST["zip_code"]);
  $ulica = mysqli_real_escape_string($conn,$_POST["street"]);
  $nr_domu = mysqli_real_escape_string($conn,$_POST["nr_h"]);
  $nr_mieszkania = mysqli_real_escape_string($conn,$_POST["nr_f"]);
  $telefon = mysqli_real_escape_string($conn,$_POST["phone_nr"]);

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

  
   
  try{
    $stmt=mysqli_prepare($conn,$sql);
  mysqli_stmt_bind_param($stmt,'sssssiis',$imie,$nazwisko,$miejscowosc,$kod_pocztowy,$ulica,$nr_domu,$nr_mieszkania,$telefon);
    mysqli_stmt_execute($stmt);
    $res =  mysqli_stmt_get_result($stmt);
    $status=1;
    }
    catch(Exception $e){
        echo "Bład dodawania danych do bazy<br>";
        $status=5;
      }
      header('Location: administrator.php?log='.strval($status));
?>