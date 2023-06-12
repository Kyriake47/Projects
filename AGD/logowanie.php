<?php
session_start();
include("polaczenie.php");


	echo "Logowanie istniejacego uzytkownika.<br>";
	
	$login = mysqli_real_escape_string($conn,$_POST["login"]);
  $haslo = mysqli_real_escape_string($conn,$_POST["password"]);
 
  try{
$sql="SELECT Password FROM users WHERE Login='$login'";
$res = $conn -> query($sql);
$row=mysqli_fetch_array($res);
}
catch(Exception $e){
  echo 'zla nazwa użytkownika';
  header('Location: index.html?log=5');
  
}

$hash_haslo= ($row["Password"]);

    if (password_verify($haslo, $hash_haslo)) {
      

      $sql = "SELECT * FROM Users
      WHERE Login=?";
      $stmt=mysqli_prepare($conn,$sql);
      mysqli_stmt_bind_param($stmt,'s',$login);
  
      $sql2 = "SELECT Function FROM Users
      WHERE Login=? ";
      $stmt2=mysqli_prepare($conn,$sql2);
      mysqli_stmt_bind_param($stmt2,'s',$login);
  
      $sqlu = "SELECT Id_user FROM Users
      WHERE Login=?";
       $stmtu=mysqli_prepare($conn,$sqlu);
       mysqli_stmt_bind_param($stmtu,'s',$login);
  
   try
          {
      mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  
  mysqli_stmt_execute($stmt2);
  $res2 = mysqli_stmt_get_result($stmt2);
  
  mysqli_stmt_execute($stmtu);
  $resu = mysqli_stmt_get_result($stmtu);
         
              
             
              
              echo(mysqli_num_rows($res));
              if(mysqli_num_rows($res)>0)
              { 
                echo "Odnaleziono użytkownika<br>";
  
                $row=mysqli_fetch_array($res2);
                $row2=mysqli_fetch_array($resu);
                 $id_row2=$row2["Id_user"];
                
                 echo($row["Function"]);
                if($row["Function"]=="U"){
               
              //  echo "$id_row2";
                 
                $_SESSION["userId"]=$id_row2;
                  header('Location: klient.php');//?id='.$id_row2);
                  echo "przekierowanie na strone uzytkownika.<br>";
                  
                
                }
                else if($row["Function"]=="P")
                {
                  $_SESSION["userId"]=$id_row2;
                  header('Location: pracownik.php');
  
                  echo "przekierowanie na strone pracownika.<br>";
                }else if($row["Function"]=="A"){
                  
                  $_SESSION["userId"]=$id_row2;
                  header('Location: administrator.php');
  
                  echo "przekierowanie na strone administratora.<br>";
  
                }else{echo "Przekierowanie nie powiodło się";}
              }else
                {
                echo "Nie odnaleziono użytkownika w bazie <br>";  
                header('Location: index.html?log=5');
              }
              
             
              
              }
          catch(Exception $e){
            echo "Bład wyszukiwarki lub logowania!<br>";
            header('Location: index.html?log=5');
          }
        }else
        {
          header('Location: index.html?log=5');
        }
         

?>