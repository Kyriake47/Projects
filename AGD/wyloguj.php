<?php
session_start();
include("polaczenie.php");
 

 session_destroy();
  header("Location: index.html");
 ?>