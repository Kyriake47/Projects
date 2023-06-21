<?php
include("polaczenie.php");











if(isset($_POST["id"])){
    $id=$_POST["id"];  
  }else{
    
      $id="0";
      echo 'nie podano id';
  }






if(($_POST["nazwa"]=="")||(!isset($_POST["nazwa"]))){
   echo 'brak nazwy produktu w formularzu';
    $result=pg_prepare($cn,"my_query1",'SELECT nazwa FROM produkty WHERE produkty.id= $1'); 
    $result=pg_execute($cn,"my_query1",array($id));
    $wiersz=pg_fetch_array($result,0, PGSQL_NUM);
    $nazwa=$wiersz[0];
    echo $nazwa; 
    echo $wiersz[0];
}else{
   $nazwa=$_POST["nazwa"];  
  echo 'nazwa produktu z formularza'; 
}






if(($_POST["ilosc"]=="")||(!isset($_POST["ilosc"]))){
    echo 'brak ilosci produktu w formularzu';
     $result=pg_prepare($cn,"my_query2",'SELECT ilosc FROM produkty WHERE produkty.id= $1'); 
    $result=pg_execute($cn,"my_query2",array($id));
    $wiersz=pg_fetch_array($result,0, PGSQL_NUM);
    $ilosc=$wiersz[0];
echo $wiersz[0]; 
 }else{
    $ilosc=$_POST["ilosc"];
   echo 'ilosc produktu z formularza'; 
 }



 if(($_POST["cena"]=="")||(!isset($_POST["cena"]))){
    echo 'brak ceny produktu w formularzu';
     $result=pg_prepare($cn,"my_query3",'SELECT cena FROM produkty WHERE produkty.id= $1'); 
    $result=pg_execute($cn,"my_query3",array($id));
    $wiersz=pg_fetch_array($result,0, PGSQL_NUM);
    $cena=$wiersz[0];
    echo $wiersz[0];

 }else{
    $cena=$_POST["cena"];  
   echo 'cena produktu z formularza'; 
 }


 if(($_POST["typ"]=="")||(!isset($_POST["typ"]))){
  echo 'brak ceny produktu w formularzu';
   $result=pg_prepare($cn,"my_query3",'SELECT typ FROM produkty WHERE produkty.id= $1'); 
  $result=pg_execute($cn,"my_query3",array($id));
  $wiersz=pg_fetch_array($result,0, PGSQL_NUM);
  $cena=$wiersz[0];
  echo $wiersz[0];

}else{
  $cena=$_POST["typ"];  
 echo 'cena produktu z formularza'; 
}







$result=pg_prepare($cn,"my_query4",'UPDATE produkty SET nazwa=$1,ilosc=$2,cena=$3,typ=$4 WHERE id=$5');
$result=pg_execute($cn,"my_query4",array($nazwa,$ilosc,$cena,$typ,$id));




 
  
    header('Location:index.php');

?>