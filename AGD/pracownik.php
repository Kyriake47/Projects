<?php 
session_start();
include("polaczenie.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pracownik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>


    <style>
@media print{
  body *{
    visibility: hidden;
  }
  .print, .print *{
    visibility: visible;
  } 
}
</style>

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
                    <button class="nav-link2 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#wybor-zgloszen" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="false">Wybór zgłoszeń</button>
                  </li>
                  <li class="nav-item" >
                    <button class="nav-link2" id="profile-tab" data-bs-toggle="tab" data-bs-target="#wybrane-zgloszenia" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Wybrane zgłoszenia</button>
                  </li>
                  <li class="nav-item" >
                    <a href="wyloguj.php"><button class="nav-link2" id="profile-tab" data-bs-toggle="tab" data-bs-target="#wyloguj" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Wyloguj</button></a>
                  </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <div class="tab-content">

      <div class="tab-pane active" id="wybor-zgloszen" >

        <?php
$sql="SELECT * FROM orders ORDER BY Data DESC";
$res = $conn -> query($sql);
      ?>

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
      <th scope="col">Wybór</th>
      
    </tr>
  </thead>
  <tbody>
  <form action="zamowienia_realizowane.php" method="POST">  
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
 <td>
 <div>
 <input class="form-check-input" type="checkbox" name="checkbox[]" value="'.$row["Id_order"].'" aria-label="">
</div>
</td>
 </tr>');
 
  
$i++;

}

?>

</tbody>

</table>
<button type="submit" name="zapisz_wybrane" class="w-30 btn btn-lg btn-primary2" type="submit">Zapisz wybrane</button>

        </form>

      </div>



      <div class="tab-pane" id="wybrane-zgloszenia">
<?php


//zapisywanie wyboru
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['status1']))
{
    $session['option_test'] = $_POST['status1'];
}
function check_selected($field_value)
{
    if($field_value === $_SESSION['option_test'])
    {
        echo ' selected';
        unset($_SESSION['option_test']);
    }
}




$id_worker=$_SESSION["userId"];
$sql="SELECT * FROM orders_in_progress WHERE Id_worker=104 && STR_TO_DATE(`data`, '%Y-%m-%d') = CURDATE() ORDER BY Data DESC;";
//$sql="SELECT * FROM orders_in_progress WHERE Id_worker=$id_worker && Data LIKE 'CURDATE()%' ORDER BY Data DESC";
$res = $conn -> query($sql);


      ?>

<button class="w-30 btn btn-lg btn-primary2 button_pracownik" onclick="window.print();">Drukuj zamówienia na dzisiaj</button>

<form action="zamowienia_zrealizowane.php" method="POST">  
<button type="submit" name="zrealizowane" class="w-30 btn btn-lg btn-primary2 button_pracownik" type="submit">Zapisz status</button>
<legend class="marginesy print">Zamówienia na dzisiaj</legend>
<table class="table table-striped print" >
 
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
      <th scope="col" style="width:300px;">Opis zgłoszenia</th>
      <th scope="col">Status</th>
      <th scope="col">Status-wybór</th>
      
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
 <td>'.$row["Status"].'</td>
 <td>
 
 <div class="col-md-3">
 <select class="form-select" name="status1" id="validationCustom04" style="width:140px">
 <option selected disabled value="">Wybór</option>
 <option value="oczekuje">Oczekuje</option>
 <option value="w_realizacji">W realizacji</option>
 <option value="zakończono">Zakończono</option>
</select>

<input name="id" style="visibility:hidden; height:0px;" value="'.$row["Id_order"].'"></input>
</div>
</td>
 </tr>');
 
  
$i++;

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// zrobić podział na dziś i pozostałe
?>

</tbody>

</table>


<?php
$id_worker=$_SESSION["userId"];
$sql="SELECT * FROM orders_in_progress WHERE Id_worker=$id_worker && STR_TO_DATE(`data`, '%Y-%m-%d') != CURDATE() ORDER BY Data DESC;";
$res = $conn -> query($sql);
      ?>

<legend class="marginesy">Pozostałe zamówienia</legend>

      <table class="table table-striped">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col" style="width:100px;">Data</th>
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
      <th scope="col" style="width:200px;">Opis zgłoszenia</th>
      <th scope="col"style="width:100px;">Status</th>
      <th scope="col">Status-wybór</th>
      
    </tr>
  </thead>
  <tbody>

<?php 





$i=1;
while($row = $res->fetch_assoc()){
  echo ('<tr>
  <th scope="row">'.$i.'</th>
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
 <td>'.$row["Status"].'</td>
 <td>
 <div class="col-md-3">

 
 <select class="form-select" name="status1" id="validationCustom04" style="width:140px">
 <option selected disabled value="">Wybór</option>
 <option value="oczekuje">Oczekuje</option>
 <option value="w_realizacji">W realizacji</option>
 <option value="zakończono">Zakończono</option>
</select>

<input name="id" style="visibility:hidden; height:0px;" value="'.$row["Id_order"].'"></input>
</td>
 </tr>');
 
  
$i++;

}
// zrobić podział na dziś i pozostałe
?>

</tbody>

</table>


        </form>

       

        
      
      </div>
      
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