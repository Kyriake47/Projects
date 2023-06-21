<?php

session_start();
include("polaczenie.php");
$status=0;
$id_worker=$_SESSION["userId"];
$status1 = mysqli_real_escape_string($conn,$_POST["status1"]);
$id = mysqli_real_escape_string($conn,$_POST["id"]);



try{
$sql="CREATE TABLE IF NOT EXISTS orders_completed (
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
}
catch(Exception $e){
echo "nie udało się stworzyc tabeli z zamówieniami zrealizowanymi";

}

try{
//if(isset($_POST['zrealizowane'])){
 //   if(!empty($_POST['checkbox'])) {
 //       foreach($_POST['checkbox'] as $selected) {
 //           echo "<p>".$selected ."</p>";

$sql="UPDATE orders_in_progress 
SET Status='$status1' 
WHERE Id_order=$id;";
$res = $conn -> query($sql);
//

$sql="SELECT Status FROM orders_in_progress WHERE Id_order=$id;";
$res = $conn -> query($sql);
$row = $res->fetch_assoc();
if($row["Status"]=='zakończono'){

$sql="INSERT INTO  orders_completed  SELECT * FROM orders_in_progress WHERE orders_in_progress.Id_order=$id";
$res = $conn -> query($sql);
    $sql="DELETE FROM orders_in_progress WHERE Id_order=$id";
    $res = $conn -> query($sql);


}

//

//

 //       }}}
       // $status=1;
   }
    catch(Exception $e){
echo "nie udało się przeniesc lub usunaczamowienia";
$status=5;
    }
        header('Location: pracownik.php?log='.strval($status));

?>