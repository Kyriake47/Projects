
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produkty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
</head>
<body>



<header class="zewnetrzny_gora">

<div class="lewy"  id="myTabContent">
      
      <legend>Dodawanie produktu</legend>

      <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <form action="dodaj_produkt.php" method="POST">
        <br>

          <div class="form-floating">
          <input type="text" name="nazwa" class="form-control" placeholder="Nazwa" required><br>
          <label for="floatingInput">Nazwa</label>
          </div>

	        <div class="form-floating">
          <input type="text" name="ilosc" class="form-control" placeholder="Ilosc" required><br>
          <label for="floatingInput">Ilość</label>
          </div>

          <div class="form-floating">
          <input type="text" name="cena" class="form-control" placeholder="Cena" required><br>
          <label for="floatingInput">Cena</label>
          </div>

          <div class="form-floating">
          <input type="text" name="typ" class="form-control" placeholder="Typ" required><br>
          <label for="floatingInput">Typ</label>
          </div>
 
      
      <button type="submit" class="w-100 btn btn-lg btn-primary" type="submit">Dodaj</button>
      </form>
    </div>
   </div>


<div class="prawy" style="border-bottom-style:none;  transform: translate(0%, -50%)">
  <legend>Wyświetlanie produktów</legend>
    <?php
    include("polaczenie.php");
    $i=0;
    $query="SELECT * FROM produkty";

    if($wynik=pg_query($query))
    {
           $licznik=pg_num_rows($wynik);
       
        
            while($i<$licznik)
	    {
	      $linia=pg_fetch_row($wynik,$i);
        echo "$linia[0]. nazwa:  $linia[1] ilość: $linia[2] cena: $linia[3]<br>";
        $i++;
      }
    }
    else {
      echo "Brak danych...";
        }

    ?>
</div>

  </header>


  <header class="zewnetrzny_dol">

<div class="lewy">
<legend>Usuwanie produktów</legend>
<legend>Produkt o jakim id chcesz usunąć?</legend>
<legend>(Nie można usunąć produktu, który ktoś zamówił)</legend>
<div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <form action="usuwanie_produktu.php" method="POST">
       <br>

       <div class="form-floating">
      <input type="text" name="id" class="form-control" placeholder="Id" required><br>
      <label for="floatingInput">Id</label>
      </div>

      <button type="submit" class="w-100 btn btn-lg btn-primary" type="submit">Usuń</button>
      </form> 
  </div>   
</div>
</header>




<header class="zewnetrzny_dol">
<div class="lewy" style="height:750px">
<legend>Zmienianie produktów</legend>
<legend>Produkt o jakim id chcesz zmianić?</legend>
<div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
    <form action="zmienianie_produktu.php" method="POST">
    <br>

       <div class="form-floating">
          <input type="text" name="id" class="form-control" placeholder="Id" required><br>
          <label for="floatingInput">Id</label>
      </div>
      <legend>Co chciałbyś zmienić?</legend>
      


      

      <div class="form-floating">
      <input type="text" name="nazwa" class="form-control" placeholder="Nazwa" ><br>
      <label for="floatingInput">Nazwa</label>
      </div>

	    <div class="form-floating">
      <input type="text" name="ilosc" class="form-control" placeholder="ilosc" ><br>
      <label for="floatingInput">Ilość</label>
      </div>

      <div class="form-floating">
      <input type="text" name="cena" class="form-control" placeholder="Cena" ><br>
      <label for="floatingInput">Cena</label>
      </div>

      <div class="form-floating">
      <input type="text" name="typ" class="form-control" placeholder="Typ" ><br>
      <label for="floatingInput">Typ</label>
      </div>
 
      
      <button type="submit" class="w-100 btn btn-lg btn-primary" type="submit">Zmień</button>

    </form>
  </div>
  </div>
    
<div class="prawy" style=" height: 500px; transform: translate(0%, -75%) ">
     <legend>---Podzapytania---</legend>
     <legend>Produkty o cenie niższej niż średnia cen wszystkich produktów</legend>
        <?php
          $query2="SELECT nazwa FROM produkty WHERE cena<(SELECT AVG(cena) FROM produkty); ";
        
          $i=0;
         
      
          if($wynik2=pg_query($query2))
          {
                 $licznik=pg_num_rows($wynik2);
             
              
                  while($i<$licznik)
            {
              $linia=pg_fetch_row($wynik2,$i);
              echo "[$i]  $linia[0]<br>";
              $i++;
            }
          }
          else {
            echo "Brak danych...";
              }



        ?>
     </div>
     </header>

     <header class="zewnetrzny_dol"> 
     <div class="prawy" style="width:1000px; transform: translate(-12%, 0%);  ">
     <legend>---Analityka OVER, PARTITION BY (Kod linia 183)---</legend>
     <?php
     $query3="SELECT
    id,nazwa,
    AVG(cena) OVER() ,
    AVG(cena) OVER (PARTITION BY typ) 
FROM produkty";


$i=0;
         
      
          if($wynik3=pg_query($query3))
          {
                 $licznik=pg_num_rows($wynik3);
             
              
                  while($i<$licznik)
            {
              $linia=pg_fetch_row($wynik3,$i);
              echo "id: $linia[0] nazwa: $linia[1] śrenia ogółem: $linia[2] średnia względem typu: $linia[3] <br>";
              $i++;
            }
          }
          else {
            echo "Brak danych...";
              }
?>
     </div>
     </header>


     <header class="zewnetrzny_dol"> 
     <div class="prawy" style="width:1000px; transform: translate(-12%, 0%);  ">
     <legend>---Analityka GROUPING SETS (Kod linia 217)---</legend>
     <?php
     $query5="SELECT nazwa,typ,sum(ilosc)
     FROM produkty
     GROUP BY
     GROUPING SETS(
     (typ),
     (nazwa,ilosc)
     );";


$i=0;
         
      
          if($wynik5=pg_query($query5))
          {
                 $licznik=pg_num_rows($wynik5);
             
              
                  while($i<$licznik)
            {
              $linia=pg_fetch_row($wynik5,$i);
              echo "nazwa: $linia[0] typ: $linia[1] suma: $linia[2] <br>";
              $i++;
            }
          }
          else {
            echo "Brak danych...";
              }
?>
     </div>
     </header>

     <header class="zewnetrzny_dol"> 
     <div class="lewy" style="width:700px; height: 300px; transform: translate(-3%, 0%)">
     <legend>---Złożone zapytanie JOIN (Kod linia 252)---</legend>
     <?php

     $query4='SELECT "Klienci"."Imie", "Klienci"."Nazwisko", "Zamowienia"."Ilosc","produkty"."nazwa"
     FROM ("Klienci" 
     LEFT OUTER JOIN "Zamowienia" ON "Klienci"."Id_klient"="Zamowienia"."Id_klient")
     INNER JOIN "produkty" ON "produkty"."id" = "Zamowienia"."Id_produkt"
     WHERE "Zamowienia"."Ilosc" BETWEEN 99 AND 200';

     $i=0;
         
      
          if($wynik4=pg_query($query4))
          {
                 $licznik=pg_num_rows($wynik4);
             
              
                  while($i<$licznik)
            {
              $linia=pg_fetch_row($wynik4,$i);
              echo "Imie: $linia[0], Nazwisko: $linia[1], Ilość: $linia[2], Cena: $linia[3]<br>";
              $i++;
            }
          }
          else {
            echo "Brak danych...";
              }
?>


</div>
     </header>


</body>
</html>