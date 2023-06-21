<?php
include("polaczenie.php");


if(isset($_POST["nazwa"])){
  $nazwa=$_POST["nazwa"];  
}else{
    $nazwa="brak";
}
if(isset($_POST["ilosc"])){
    $ilosc=$_POST["ilosc"];
}else{
    $ilosc="0";
}
if(isset($_POST["cena"])){
  $cena=$_POST["cena"];  
}else{
    $cena="0";
}
if(isset($_POST["typ"])){
    $typ=$_POST["typ"];  
  }else{
      $typ="brak";
  }

 
    $result=pg_prepare($cn,"my_query",'INSERT INTO produkty (nazwa,ilosc,cena,typ) VALUES($1,$2,$3,$4)');
$result=pg_execute($cn,"my_query",array($nazwa,$ilosc,$cena,$typ));
    

 
  header('Location:index.php');


?>