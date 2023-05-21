<?php
session_start();
include("polaczenie.php");


	echo "Logowanie istniejacego uzytkownika.<br>";
	
	$login = mysqli_real_escape_string($conn,$_POST["login"]);
  $haslo = mysqli_real_escape_string($conn,$_POST["password"]);
 
    
    $sql = "SELECT * FROM Users
    WHERE Login=? AND Password=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,'ss',$login,$haslo);

    $sql2 = "SELECT Function FROM Users
	  WHERE Login=? AND Password=?";
    $stmt2=mysqli_prepare($conn,$sql2);
    mysqli_stmt_bind_param($stmt2,'ss',$login,$haslo);

    $sqlu = "SELECT Id FROM Users
    WHERE Login=? AND Password=?";
     $stmtu=mysqli_prepare($conn,$sqlu);
     mysqli_stmt_bind_param($stmtu,'ss',$login,$haslo);

 try
        {
    mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

mysqli_stmt_execute($stmt2);
$res2 = mysqli_stmt_get_result($stmt2);

mysqli_stmt_execute($stmtu);
$resu = mysqli_stmt_get_result($stmtu);
       
            
           
            
            
            if(mysqli_num_rows($res)>0)
            { 
              echo "Odnaleziono użytkownika<br>";

              $row=mysqli_fetch_array($res2);
              $row2=mysqli_fetch_array($resu);
              
              
              if($row["Function"]=="U"){
              $id_row2=$row2["Id"];
            //  echo "$id_row2";
               
              $_SESSION["userId"]=$id_row2;
                header('Location: klient.php');//?id='.$id_row2);
                echo "przekierowanie na strone uzytkownika.<br>";
                
              }
              else if($row["Function"]=="P")
              {
                echo "przekierowanie na strone pracownika.<br>";
                
              }else{echo "Przekierowanie nie powiodło się";}
            }else
              {
              echo "Nie odnaleziono użytkownika w bazie <br>";  
            }
            
           
            
            }
        catch(Exception $e){
          echo "Bład wyszukiwarki lub logowania!<br>";
        }
       

?>