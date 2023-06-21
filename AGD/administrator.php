<?php 
session_start();
include("polaczenie.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
<!-- javaskrypt-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(function($){
       $(".kod").mask("99-999");
       $(".kod2").mask("999-999-999");
    });
  </script>

  </head>
  <body style="background-color: rgb(238, 238, 238);">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <!-- obrazek menu-->
        <div class="container">
            <a class="navbar-brand" href="#">
            <img src="logo2.png" alt="Naprawa sprzętu AGD" width="50" height="50">
            </a>
          </div>
<!-- menu zakładki-->
      <div class="collapse navbar-collapse" id="navbarNavDropdown" role="tablist">
        <ul class="navbar-nav">
            
            <li class="nav-item" >
                <button class="nav-link2 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#wybor-dat-zamowien" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="false">Daty zamówień</button>
              </li>
              <li class="nav-item" >
                <button class="nav-link2 " id="profile-tab" data-bs-toggle="tab" data-bs-target="#dodaj-nowego-uzytkownika" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Dodaj użytkownika</button>
              </li>
              <li class="nav-item" >
                <button class="nav-link2 " id="profile-tab" data-bs-toggle="tab" data-bs-target="#uzytkownicy" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Użytkownicy</button>
              </li>
              <li class="nav-item" >
                    <button class="nav-link2" id="profile-tab" data-bs-toggle="tab" data-bs-target="#wszystkie-zamowienia" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Wyświetl zamówienia</button>
                  </li>
              <li class="nav-item" >
              <a href="wyloguj.php"><button class="nav-link2" id="profile-tab" data-bs-toggle="tab" data-bs-target="#wykoguj" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Wyloguj</button></a>
              </li>
          
        </ul>
      </div>
    </div>
  </nav>

<div class="tab-content">


<div class="tab-pane marginesy  active" id="wybor-dat-zamowien" >


  <form action="administrator_daty.php" method="POST">
    <div class="nowe-zamowienie-l" >
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Data</th>
          </tr>
        </tread>


        <tbody>

<?php 

$sql="SELECT * FROM dates ORDER BY Date";
$res = $conn -> query($sql);

while($row = $res->fetch_assoc()){
  echo ('<tr>
  <td>'.$row["Date"].'</td>
  
 </tr>');

}

?>

</tbody>




      </table>
    </div>
    <input type="datetime-local" name="date" id="date-local">
    <button type="submit" class="w-30 btn btn-lg btn-primary2 button_pracownik">Dodaj</button>
  </form>
</div>





  <div class="tab-pane" id="dodaj-nowego-uzytkownika" >

    <form action="administrator_nowy_uzytkownik.php" method="POST">
        <div class="nowe-zamowienie-l" >
            
          <legend>Nowy użytkownik</legend>
          
          <div class="input-group mb-3" >
            <span class="input-group-text">Login</span>
            <input class="form-control" name="login" type="text" placeholder="Login" >
          </div>


          <div class="input-group mb-3" >
            <span class="input-group-text">Hasło</span>
            <input class="form-control" name="password" type="password" placeholder="Hasło" value="tajnehaslo">
          </div>

          <div class="input-group mb-3" >
            <span class="input-group-text">Email</span>
            <input class="form-control" name="email" type="text" placeholder="name@email.pl">
          </div>

          <div class="input-group mb-3" >

          <select class="form-select" name="function" aria-label="Default select example">
            <option selected>Wybierz funkcję nowego użytkowanika</option>
              <option value="U">Klient</option>
              <option value="P">Pracownik</option>
              <option value="A">Administrator</option>
            </select>




            
          </div>


          <div class="input-group mb-3" >
            <span class="input-group-text">Imię</span>
            <input class="form-control" name="name" type="text" placeholder="Imię" >
          </div>


        
          <div class="input-group mb-3">
            <span class="input-group-text">Nazwisko</span>
            <input class="form-control" name="last_name"  type="text" placeholder="Nazwisko">
          </div>

     


          <div class="input-group mb-3">
            <span class="input-group-text">Miejscowość</span>
            <input class="form-control" name="city" type="text" placeholder="Miejscowość">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">Kod pocztowy</span>
            <input class="form-control kod" name="zip_code" type="text" placeholder="99-999" >
          </div>


          <div class="input-group mb-3">
            <span class="input-group-text">Ulica</span>
            <input class="form-control" name="street" type="text" placeholder="Ulica">
          
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">Numer</span>
            <input class="form-control" name="nr_h" type="text" placeholder="Nr domu">
            <input class="form-control" name="nr_f" type="text" placeholder="Nr mieszkania">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">Telefon kontaktowy</span>
            <input class="form-control kod2" name="phone_nr" type="text" placeholder="999-999-999" >
          </div>

        </div>

    <button type="submit" name="a_nowy_uzytkownik" class="w-30 btn btn-lg btn-primary2 button_pracownik">Dodaj nowego użytkownika</button>
    </form>



    
  </div>
  


  <div class="tab-pane" id="wszystkie-zamowienia">

  <?php
        $sql="SELECT * FROM orders_in_progress ORDER BY Data DESC";
        $res = $conn -> query($sql);
      ?>
    <legend class="marginesy">Zamówieniania w realizacji</legend>
    <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Data</th>
      <th scope="col">Miejscowość</th>
      <th scope="col">Kod-pocztowy</th> 
      <th scope="col">Ulica</th>
      <th scope="col">Nr domu</th>
      <th scope="col">Nr_ mieszkania</th>
      <th scope="col">Imię zamawiającego</th>
      <th scope="col">Nazwisko zamawiającego</th>  
      <th scope="col">Telefon kontaktowy</th>
      <th scope="col">Typ urządzenia</th>
      <th scope="col">Model</th>
      <th scope="col">Opis zgłoszenia</th>
      <th scope="col">Id pracownika</th>
      
    </tr>
  </thead>
  <tbody>
    
<?php 

$i=1;
while($row = $res->fetch_assoc()){
  echo ('<tr><th scope="row">'.$i.'</th>
  <td>'.$row["Data"].'</td>
  <td>'.$row["City"].'</td>
  <td>'.$row["Zip_code"].'</td>
  <td>'.$row["Street"].'</td>
  <td>'.$row["Nr_h"].'</td>
 <td>'.$row["Nr_f"].'</td>
  <td>'.$row["Name"].'</td>
  <td>'.$row["Last_name"].'</td>
  <td>'.$row["Telephone"].'</td>
  <td>'.$row["Type"].'</td>
  <td>'.$row["Model"].'</td>
 <td>'.$row["Info"].'</td>
 <td>'.$row["Id_worker"].'</td>
 </tr>');
$i++;

}

?>

</tbody>

</table>








      <?php
        $sql="SELECT * FROM orders ORDER BY Data DESC";
        $res = $conn -> query($sql);
      ?>
    <legend class="marginesy">Zamówienianie oczekujące</legend>
    <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Data</th>
      <th scope="col">Miejscowość</th>
      <th scope="col">Kod-pocztowy</th> 
      <th scope="col">Ulica</th>
      <th scope="col">Nr domu</th>
      <th scope="col">Nr_ mieszkania</th>
      <th scope="col">Imię zamawiającego</th>
      <th scope="col">Nazwisko zamawiającego</th>  
      <th scope="col">Telefon kontaktowy</th>
      <th scope="col">Typ urządzenia</th>
      <th scope="col">Model</th>
      <th scope="col">Opis zgłoszenia</th>
  
      
    </tr>
  </thead>
  <tbody>
    
<?php 

$i=1;
while($row = $res->fetch_assoc()){
  echo ('<tr><th scope="row">'.$i.'</th>
  <td>'.$row["Data"].'</td>
  <td>'.$row["City"].'</td>
  <td>'.$row["Zip_code"].'</td>
  <td>'.$row["Street"].'</td>
  <td>'.$row["Nr_h"].'</td>
 <td>'.$row["Nr_f"].'</td>
  <td>'.$row["Name"].'</td>
  <td>'.$row["Last_name"].'</td>
  <td>'.$row["Telephone"].'</td>
  <td>'.$row["Type"].'</td>
  <td>'.$row["Model"].'</td>
 <td>'.$row["Info"].'</td>
 </tr>');
$i++;

}

?>

</tbody>

</table>

  </div>

  <div class="tab-pane" id="uzytkownicy">

<?php
      $sql="SELECT * FROM users,data WHERE users.Function='P' AND users.Id_user=data.Id_user";
      $res = $conn -> query($sql);
    ?>
  <legend class="marginesy">Pracownicy</legend>
  <table class="table table-striped">
  <thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Id użytkownika</th>
    <th scope="col">Miejscowość</th>
    <th scope="col">Kod-pocztowy</th> 
    <th scope="col">Ulica</th>
    <th scope="col">Nr domu</th>
    <th scope="col">Nr_ mieszkania</th>
    <th scope="col">Imię</th>
    <th scope="col">Nazwisko</th>  
    <th scope="col">Telefon kontaktowy</th>
  </tr>
</thead>
<tbody>
  
<?php 

$i=1;
while($row = $res->fetch_assoc()){
echo ('<tr><th scope="row">'.$i.'</th>
<td>'.$row["Id_user"].'</td>
<td>'.$row["City"].'</td>
<td>'.$row["Zip_code"].'</td>
<td>'.$row["Street"].'</td>
<td>'.$row["Nr_h"].'</td>
<td>'.$row["Nr_f"].'</td>
<td>'.$row["Name"].'</td>
<td>'.$row["Last_name"].'</td>
<td>'.$row["Telephone"].'</td>

</tr>');
$i++;

}

?>

</tbody>

</table>




<?php
      $sql="SELECT * FROM users,data WHERE users.Function='A' AND users.Id_user=data.Id_user";
      $res = $conn -> query($sql);
    ?>
  <legend class="marginesy">Administratorzy</legend>
  <table class="table table-striped">
  <thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Id użytkownika</th>
    <th scope="col">Miejscowość</th>
    <th scope="col">Kod-pocztowy</th> 
    <th scope="col">Ulica</th>
    <th scope="col">Nr domu</th>
    <th scope="col">Nr_ mieszkania</th>
    <th scope="col">Imię</th>
    <th scope="col">Nazwisko</th>  
    <th scope="col">Telefon kontaktowy</th>
  </tr>
</thead>
<tbody>
  
<?php 

$i=1;
while($row = $res->fetch_assoc()){
echo ('<tr><th scope="row">'.$i.'</th>
<td>'.$row["Id_user"].'</td>
<td>'.$row["City"].'</td>
<td>'.$row["Zip_code"].'</td>
<td>'.$row["Street"].'</td>
<td>'.$row["Nr_h"].'</td>
<td>'.$row["Nr_f"].'</td>
<td>'.$row["Name"].'</td>
<td>'.$row["Last_name"].'</td>
<td>'.$row["Telephone"].'</td>

</tr>');
$i++;

}

?>

</tbody>

</table>

<?php
      $sql="SELECT * FROM users,data WHERE users.Function='U' AND users.Id_user=data.Id_user";
      $res = $conn -> query($sql);
    ?>
  <legend class="marginesy">Klienci</legend>
  <table class="table table-striped">
  <thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Id użytkownika</th>
    <th scope="col">Miejscowość</th>
    <th scope="col">Kod-pocztowy</th> 
    <th scope="col">Ulica</th>
    <th scope="col">Nr domu</th>
    <th scope="col">Nr_ mieszkania</th>
    <th scope="col">Imię</th>
    <th scope="col">Nazwisko</th>  
    <th scope="col">Telefon kontaktowy</th>
  </tr>
</thead>
<tbody>
  
<?php 

$i=1;
while($row = $res->fetch_assoc()){
echo ('<tr><th scope="row">'.$i.'</th>
<td>'.$row["Id_user"].'</td>
<td>'.$row["City"].'</td>
<td>'.$row["Zip_code"].'</td>
<td>'.$row["Street"].'</td>
<td>'.$row["Nr_h"].'</td>
<td>'.$row["Nr_f"].'</td>
<td>'.$row["Name"].'</td>
<td>'.$row["Last_name"].'</td>
<td>'.$row["Telephone"].'</td>

</tr>');
$i++;

}

?>

</tbody>

</table>
</div>





<div class="popup" id="popup">
        <img src="ok.png">
        <h2>Udało się!</h2>
       
        <button type="button" onclick="closePopup()">OK</button>
      </div>

      <div class="popup" id="popup2">
        <img src="error.png">
        <h2>Coś poszło nie tak</h2>
        <p>Spróbuj jeszcze raz</p>
        <button type="button" onclick="closePopup()">OK</button>
      </div>


      <script>
let popup=document.getElementById("popup");
let popup2=document.getElementById("popup2");
//$log = $_POST["log"];
const searchParams = new URLSearchParams(window.location.search)
log=searchParams.get("log");

if(log==1)
{
popup.classList.add("open-popup");
}else if(log==5){
  popup2.classList.add("open-popup");
}
else{
popup.classList.remove("open-popup");
}



function closePopup(){
  popup.classList.remove("open-popup");
  popup2.classList.remove("open-popup");
}

        </script>

      

  
</body>
</html>