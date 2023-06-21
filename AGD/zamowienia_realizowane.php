<?php 
session_start();
include("polaczenie.php");
$status=0;
$id_worker=$_SESSION["userId"];

$sql = "CREATE TABLE IF NOT EXISTS orders_in_progress(
    Id_order INT PRIMARY KEY UNIQUE,
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
    Data DATETIME,
    Id_worker INT,
    Status VARCHAR(10),
FOREIGN KEY (Id_user) REFERENCES users(Id_user)
    )";

$res = $conn -> query($sql);

if(isset($_POST['zapisz_wybrane'])){
    if(!empty($_POST['checkbox'])) {
        foreach($_POST['checkbox'] as $selected) {
            echo "<p>".$selected ."</p>";

$sql="INSERT INTO orders_in_progress (Id_order,Id_user,Name,Last_name,City,Zip_code,Street,Nr_h,Nr_f,Telephone,Type,Model,Info,Data) 
SELECT orders.Id_order,orders.Id_user,orders.Name,orders.Last_name,orders.City,orders.Zip_code,orders.Street,orders.Nr_h,orders.Nr_f,orders.Telephone,orders.Type,orders.Model,orders.Info,orders.Data 
FROM orders 
WHERE orders.Id_order=$selected";
try{
$res = $conn -> query($sql);
$sql="UPDATE orders_in_progress SET Id_worker=$id_worker WHERE orders_in_progress.Id_order=$selected";
$res = $conn -> query($sql);
$sql="DELETE FROM orders WHERE Id_order=$selected";
$res = $conn -> query($sql);
$status=1;
        }
    
        catch(Exception $e){
            $status=5;
        }


    }
//dopisać usuwanie wiersza i odświeżanie strony
    }}
    header('Location: pracownik.php?log='.strval($status));

   










?>




