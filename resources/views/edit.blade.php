<h1> EDYCJA DANYCH </h1>
<form action="" method="POST">

<label class="control-label col-sm-2" for="data">Data:<!-- pierwszy wiersz 1 kolumna -->
   <div class="col-sm-10">
   <input type="date" name="data" class="form-control" id="data" value="{{$numer_dowodu_wplaty['data']}}"> </label><!-- pierwszy wiersz 2 kolumna -->
  </div>
  <label class="control-label col-sm-2" for="tresc">Opis:
<div class="col-sm-10"> 
   <input type="text" action="#" name="tresc" class="form-control" placeholder="Wprowadź opis wpłaty" id="tresc" value="{{$numer_dowodu_wplaty['tresc']}}" > </label><!-- drugi wiersz 2 kolumna -->
   </div>

   <label class="control-label col-sm-2" for="tresc">Kwota wpłaty:   <!-- 3  wiersz 2 kolumna -->
<div class="col-sm-10"> 
   <input type="number" class="form-control" placeholder="1.00" step="0.01" min="0" max="100000000" name="kwota_przychodu" value="{{$numer_dowodu_wplaty['kwota_przychodu']}}"></label> 
   </div>

<button type="submit" class="btn btn-default">Edytuj wpłatę</button>