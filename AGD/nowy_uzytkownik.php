
<?php
include("polaczenie.php");

$email = mysqli_real_escape_string($conn,$_POST["email"]);
$login = mysqli_real_escape_string($conn,$_POST["login"]);
	$haslo = mysqli_real_escape_string($conn,$_POST["password"]);
$hash_haslo=password_hash($haslo,PASSWORD_DEFAULT);

$sql = "INSERT INTO Users (Login,Password,Email,Function)
VALUES (?,?,?,'U')";
$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,'sss',$login,$hash_haslo,$email);



try{
mysqli_stmt_execute($stmt);
$res =  mysqli_stmt_get_result($stmt);

}
catch(Exception $e){
    echo "Bład utworzenia użytkownika<br>";
    header('Location: index.html?log=5');
  }



//odpytanie o id dopiero dodanego użytownika i dodanie tego id do drgiej tabeli o nazwie data



try{
  $sql2 = "SELECT Id_user FROM Users
  WHERE Login=?";
  $stmt2=mysqli_prepare($conn,$sql2);
  mysqli_stmt_bind_param($stmt2,'s',$login);
  mysqli_stmt_execute($stmt2);


 $res2 = mysqli_stmt_get_result($stmt2);

 $row=mysqli_fetch_array($res2);

 echo ($row["Id_user"]);
 $Id=$row["Id_user"];

 $sql3 = "INSERT INTO Data(Id_user, Name, Last_name, City, Zip_code, Street, Nr_h, Nr_f, Telephone)
  VALUES ($Id,' ',' ',' ',' ',' ',' ',' ',' ')";
   $res = $conn -> query($sql3);
  //$stmt3=mysqli_prepare($conn,$sql3);
 // mysqli_stmt_execute($stmt3);

 header('Location: index.html?log=1');


}
catch(Exception $e){
  echo ("nie mozna dodać id do tabeli data");
  header('Location: index.html?log=5');
}
echo("uzytkownik zostal dodany");
?>

