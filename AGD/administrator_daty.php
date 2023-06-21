<?php 
session_start();
include("polaczenie.php");
$data = mysqli_real_escape_string($conn,$_POST["date"]);
$status=0;
$sql = "CREATE TABLE IF NOT EXISTS dates(
    Date DATETIME
)";
$res = $conn -> query($sql);

$sql="INSERT INTO dates (Date) VALUES (?)";
$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,'s',$data);

try{
    mysqli_stmt_execute($stmt);
    $res =  mysqli_stmt_get_result($stmt);
    $status=1;
    }
    catch(Exception $e){
        echo "Bład dodawania daty do bazy<br>";
        $status=5;
      }


      header('Location: administrator.php?log='.strval($status));
      



  
 
