<?php 
session_start();
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
       $("#kod").mask("99-999");
       $("#kod2").mask("999-999-999");
    });
  </script>

  </head>
  <body>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <!-- obrazek menu-->
            <div class="container">
                <a class="navbar-brand" href="#">
                  <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Naprawa sprzętu AGD" width="30" height="24">
                </a>
              </div>
<!-- menu zakładki-->
          <div class="collapse navbar-collapse" id="navbarNavDropdown" role="tablist">
            <ul class="navbar-nav">
                <li class="nav-item" >
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#nowe-zamowienie" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="false">Zamów naprawę</button>
                  </li>
                  <li class="nav-item" >
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#moje-dane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Moje dane</button>
                  </li>
                  <li class="nav-item" >
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#historia-zamowien" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Historia zamówień</button>
                  </li>
              <li class="nav-item dropdown" >
                <button class="nav-link dropdown-toggle"  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  O firmie
                </button>
                <ul class="dropdown-menu">
                  <li><button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#oferta" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Oferta</button></li>
                  <li><button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Cennik</button></li>
                  <li><button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Mapa</button></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="tab-content">
      <div class="tab-pane active" id="nowe-zamowienie" >

<div>
        
        <form action="wyslij_zamowienie.php" method="POST">
          <div class="nowe-zamowienie-l" >
          <legend>Dane zamawiającego</legend>
          <div class="input-group mb-3" >
          <span class="input-group-text">Imię</span>
          <input class="form-control" name="name" type="text" placeholder="Imię" >
        </div>
        
        <div class="input-group">
          <span class="input-group-text">Nazwisko</span>
          <input class="form-control" name="last_name" type="text" placeholder="Nazwisko" >
        </div>

        <legend>Adres</legend>


        <div class="input-group">
          <span class="input-group-text">Miejscowość</span>
          <input class="form-control" name="city" type="text" placeholder="Miejscowość" >
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">Kod pocztowy</span>
          <input class="form-control" name="zip_code" type="text" id="kod" placeholder="99-999" >
        </div>


        <div class="input-group">
          <span class="input-group-text">Ulica</span>
          <input class="form-control" name="street" type="text" placeholder="Ulica" >
          
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">Numer</span>
          <input class="form-control" name="nr_h" type="text" placeholder="Nr domu" >
          <input class="form-control" name="nr_f" type="text" placeholder="Nr mieszkania" >
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">Telefon kontaktowy</span>
          <input class="form-control" name="phone_nr" type="text" id="kod2" placeholder="999-999-999" >
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
              
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
             <div class="mb-5">

              <label for="date">Wybierz datę naprawy</label>
              <input type="date" name="date" id="date-local">
             </div>
             <button type="submit" value="wyslij_zamowienie" class="w-30 btn btn-lg btn-primary" >Wyślij zgłoszenie</button> 
 </div>

          </form>
       
        
</div>


      </div>
      <div class="tab-pane" id="moje-dane" >
       
        <legend>Informacje o urzytkowniku</legend>

        <form action="dane.php" method="POST">

 <?php
           //$id = $_GET["id"];
       // echo($_SESSION["userId"]);
        ?>



          <div class="mb-3 row">
            <label for="nr_użytkownika" class="col-sm-2 col-form-label">Nr użytkownika</label>
            <div class="col-sm-10">
              <input type="text" name="id" readonly class="form-control-plaintext" id="nr_użytkownika"  value=<?php echo $_SESSION["userId"];?>>
            </div>
          </div>
     
          <div class="input-group mb-3" >
          <span class="input-group-text">Imię</span>
          <input class="form-control" type="text" placeholder="Imię" >
        </div>
        
        <div class="input-group mb-3">
          <span class="input-group-text">Nazwisko</span>
          <input class="form-control" type="text" placeholder="Nazwisko" >
        </div>

     


        <div class="input-group mb-3">
          <span class="input-group-text">Miejscowość</span>
          <input class="form-control" type="text" placeholder="Miejscowość" >
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">Kod pocztowy</span>
          <input class="form-control" type="text" id="kod" placeholder="99-999" >
        </div>


        <div class="input-group mb-3">
          <span class="input-group-text">Ulica</span>
          <input class="form-control" type="text" placeholder="Ulica" >
          
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">Numer</span>
          <input class="form-control" type="text" placeholder="Nr domu" >
          <input class="form-control" type="text" placeholder="Nr mieszkania" >
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">Telefon kontaktowy</span>
          <input class="form-control" type="text" id="kod2" placeholder="999-999-999" >
        </div>
        <button type="submit" class="w-100 btn btn-lg btn-primary" type="submit">Zapisz dane</button>
        </form>
        </div>


      <div class="tab-pane" id="historia-zamowien">ghi</div>
      <div class="tab-pane" id="oferta">jke</div>
      </div>
</body>
</html>