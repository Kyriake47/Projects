<?php


$cn=pg_connect("host=localhost port=5432 dbname=Produkty user=postgres password=admin");
if($cn){
    echo "Połączenie z bazą...";
}



   ?>