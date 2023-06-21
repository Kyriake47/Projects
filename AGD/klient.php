<?php 
session_start();
include("polaczenie.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Klient</title>
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
                    <button class="nav-link2 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#nowe-zamowienie" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="false">Zamów naprawę</button>
                  </li>
                  <li class="nav-item" >
                    <button class="nav-link2" id="profile-tab" data-bs-toggle="tab" data-bs-target="#moje-dane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Moje dane</button>
                  </li>
                  <li class="nav-item" >
                    <button class="nav-link2" id="profile-tab" data-bs-toggle="tab" data-bs-target="#historia-zamowien" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Historia zamówień</button>
                  </li>
              <li class="nav-item dropdown" >
                <button class="nav-link2 dropdown-toggle"  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  O firmie
                </button>
                <ul class="dropdown-menu">
                  <a href="oferta.html"><li><button class="nav-link2" id="profile-tab" data-bs-toggle="tab" data-bs-target="#oferta" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Oferta</button></li></a>
                  <a href="mapa.html"><li><button class="nav-link2" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Mapa</button></li></a>
                </ul>
              </li>
              <li class="nav-item" >
                    <a href="wyloguj.php"><button class="nav-link2" id="profile-tab" data-bs-toggle="tab" data-bs-target="#wyloguj" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Wyloguj</button></a>
                  </li>
            </ul>
          </div>
        </div>
      </nav>



 




      <div class="tab-content">
      <div class="tab-pane active" id="nowe-zamowienie" >

<div>

<?php    

 $id_user=$_SESSION["userId"];
 $sql="SELECT * FROM data WHERE Id_user=$id_user";
 $res = $conn -> query($sql);
 $row=mysqli_fetch_array($res);
 
  ?>
     

        
        <form action="wyslij_zamowienie.php" method="POST">
          <div class="nowe-zamowienie-l" >
          <legend>Dane zamawiającego</legend>
          <div class="input-group mb-3" >
          <span class="input-group-text">Imię</span>
          <input class="form-control" name="name" type="text" placeholder="Imię" value=<?php echo $row["Name"]?> >
        </div>
        
        <div class="input-group">
          <span class="input-group-text">Nazwisko</span>
          <input class="form-control" name="last_name" type="text" placeholder="Nazwisko" value=<?php echo $row["Last_name"]?> >
        </div>

        <legend>Adres</legend>


        <div class="input-group">
          <span class="input-group-text">Miejscowość</span>
          <input class="form-control" name="city" type="text" placeholder="Miejscowość" value=<?php echo $row["City"]?>>
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">Kod pocztowy</span>
          <input class="form-control kod" name="zip_code" type="text" placeholder="99-999" value=<?php echo $row["Zip_code"]?> >
        </div>


        <div class="input-group">
          <span class="input-group-text">Ulica</span>
          <input class="form-control" name="street" type="text" placeholder="Ulica" value=<?php echo $row["Street"]?> >
          
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">Numer</span>
          <input class="form-control" name="nr_h" type="text" placeholder="Nr domu" value=<?php echo $row["Nr_h"]?> >
          <input class="form-control" name="nr_f" type="text" placeholder="Nr mieszkania" value=<?php echo $row["Nr_f"]?> >
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">Telefon kontaktowy</span>
          <input class="form-control kod2" name="phone_nr" type="text" placeholder="999-999-999" value=<?php echo $row["Telephone"]?>>
        </div>
</div>
      
       


              <div class="nowe-zamowienie-p" >
            <legend>Informacje o zgłoszeniu</legend>

            <div class="input-group mb-3">
              <span class="input-group-text">Przedmiot naprawy np. pralka, lodówka itp.</span>
              <input class="form-control" name="type" type="text" placeholder="" >
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text">Model</span>
              <input class="form-control" name="model" type="text" placeholder="Model" >
              
            </div>


            <div class="mb-3">
              <legend>Informacje o awarii</legend>
              
              <textarea class="form-control" name="info" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            





             
           <input  id='dataselect' style="display: none;" name="date">
    <div class="list-group" id="list-tab" role="tablist">
    <?php 

$sql="SELECT * FROM dates ORDER BY Date";
$res = $conn -> query($sql);


while($row = $res->fetch_assoc()){
  echo ('<tr>
  <td><a class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" value="'.$row["Date"].'" aria-controls="list-home">'.$row["Date"].'</a>
  </td>
  
 </tr>');

}

?>
    <script>
    $('#list-tab').on('click', function (e) 
    {
      document.getElementById('dataselect').value=e.target.innerHTML;
    })
    </script>

    </div>
  













             <button type="submit" value="wyslij_zamowienie" class="w-30 btn btn-lg btn-primary2 marginesy" >Wyślij zgłoszenie</button> 
 </div>

          </form>
       
        
</div>


      </div>

      <div class="tab-pane" id="moje-dane" >
       <div class="dane">

        <legend>Informacje o użytkowniku</legend>

        <form action="dane.php" method="POST">

 <?php
           //$id = $_GET["id"];
       // echo($_SESSION["userId"]);
        ?>
<?php    


$sql="SELECT * FROM data WHERE Id_user=$id_user";
$res = $conn -> query($sql);
$row=mysqli_fetch_array($res);

 ?>



          <div class="mb-3 row">
            <label for="nr_użytkownika" class="col-sm-2 col-form-label">Nr użytkownika</label>
            <div class="col-sm-10">
              <input type="text" name="id" readonly class="form-control-plaintext" id="nr_użytkownika"  value=<?php echo $_SESSION["userId"];?>>
            </div>
          </div>
 
          <div class="input-group mb-3" >
          <span class="input-group-text">Imię</span>
          <input class="form-control" name="name" type="text" placeholder="Imię" value=<?php echo $row["Name"]?> >
        </div>


        
        <div class="input-group mb-3">
          <span class="input-group-text">Nazwisko</span>
          <input class="form-control" name="last_name"  type="text" placeholder="Nazwisko" value=<?php echo $row["Last_name"]?>>
        </div>

     


        <div class="input-group mb-3">
          <span class="input-group-text">Miejscowość</span>
          <input class="form-control" name="city" type="text" placeholder="Miejscowość" value=<?php echo $row["City"]?>>
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">Kod pocztowy</span>
          <input class="form-control kod" name="zip_code" type="text" placeholder="99-999" value=<?php echo $row["Zip_code"]?>>
        </div>


        <div class="input-group mb-3">
          <span class="input-group-text">Ulica</span>
          <input class="form-control" name="street" type="text" placeholder="Ulica" value=<?php echo $row["Street"]?>>
          
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">Numer</span>
          <input class="form-control" name="nr_h" type="text" placeholder="Nr domu" value=<?php echo $row["Nr_h"]?> >
          <input class="form-control" name="nr_f" type="text" placeholder="Nr mieszkania" value=<?php echo $row["Nr_f"]?>>
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">Telefon kontaktowy</span>
          <input class="form-control kod2" name="phone_nr" type="text" placeholder="999-999-999" value=<?php echo $row["Telephone"]?>>
        </div>
        <button type="submit" class="w-30 btn btn-lg btn-primary2" type="submit">Zapisz dane</button>

        </form>


  </div>
        </div>


      <div class="tab-pane" id="historia-zamowien">
        
      <?php

   






$sql="SELECT * FROM orders WHERE Id_user=$id_user";
$res = $conn -> query($sql);

      ?>


<table class="table table-striped">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Data</th>
      <th scope="col">Typ urządzenia</th>
      <th scope="col">Model</th>
      <th scope="col">Opis zgłoszenia</th>
      <th scope="col">Imię zamawiającego</th>
      <th scope="col">Nazwisko zamawiającego</th>  
      <th scope="col">Miejscowość</th>
      <th scope="col">Ulica</th>
      <th scope="col">Nr domu</th>
      <th scope="col">Nr_ mieszkania</th>
    </tr>
  </thead>
  <tbody>
<?php 

$i=1;
while($row = $res->fetch_assoc()){
  echo ('<tr><th scope="row">'.$i.'</th>
  <td>'.$row["Data"].'</td>
  <td>'.$row["Type"].'</td>
  <td>'.$row["Model"].'</td>
 <td>'.$row["Info"].'</td>
  <td>'.$row["Name"].'</td>
  <td>'.$row["Last_name"].'</td>
  <td>'.$row["City"].'</td>
  <td>'.$row["Street"].'</td>
  <td>'.$row["Nr_h"].'</td>
 <td>'.$row["Nr_f"].'</td></tr>');
$i++;

}


?>
</tbody>
</table>



      
      
      
      </div>
      <div class="tab-pane" id="oferta">jke</div>
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
popup2.classList.remove("open-popup");
}



function closePopup(){
  popup.classList.remove("open-popup");
  popup2.classList.remove("open-popup");
}

        </script>

</body>
</html>