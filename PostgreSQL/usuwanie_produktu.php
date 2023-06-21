<?php
include("polaczenie.php");
if(isset($_POST["id"])){
    $id=$_POST["id"];  
  }else{
      $id="0";
  }

  $result=pg_prepare($cn,"my_query",'DELETE FROM produkty WHERE id=$1');
  $result=pg_execute($cn,"my_query",array($id));


  header('Location:index.php');
?>