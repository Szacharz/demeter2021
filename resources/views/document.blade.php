<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dementor</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
#t01 tr:nth-child(even) {
  background-color: #eee;
}
#t01 tr:nth-child(odd) {
 background-color: #fff;
}
#t01 th {
  background-color: lightblue;
  color: black;
}
#t02 th {
  background-color:#ff6666;
  color: black;
}


</style>


<h3><a style="float:right;text-align:right;">RAPORT KASOWY NR ............... </a>
</h3>
<br><br> <br>
<h3><a style="float:right;text-align:right;">Za okres: od........... do......... m-ca................... r. </a>
</h3>
<br><br><br>
<caption><h3> Podsumowanie wplat </h3></caption>
  <table id="t01", style="width: 100%">
    <tr>
        <th>Id</th>
        <th>Numer wplaty</th>
        <th>Data</th>
        <th>Tresc</th>
        <th>Kwota przychodu</th>
      </tr>
      @foreach($wplata as $row)
      <tr>
        <td>{{$row['id']}}</td>
        <td>{{$row['numer_wplaty']}}</td>
        <td>{{$row['data']}}</td>
        <td>{{$row['tresc']}}</td>
        <td>{{$row['kwota_przychodu']}}</td>
      </tr>
      @endforeach
      </tr>
        
    </table>
  
    <br>
 
    <h3><a style="float:right;text-align:right;">SUMA: ........................................ zl </a>
   <br><br>
  <caption> <h3> Podsumowanie wyplat </h3> </caption>
  <table id="t02", style="width: 100%">
      <tr>
        <th>Id</th>
        <th>Numer wyplaty</th>
        <th>Data</th>
        <th>Tresc</th>
        <th>Kwota rozchodu</th>
      </tr>
      @foreach($wyplata as $row)
      <tr>
          <td>{{$row['id']}}</td>
          <td>{{$row['numer_wyplaty']}}</td>
          <td>{{$row['data']}}</td>
          <td>{{$row['tresc']}}</td>
          <td>{{$row['kwota_rozchodu']}}</td>
         
      </tr>
      @endforeach
    </table>
  
    <h3><a style="float:right;text-align:right;">SUMA: ........................................ zl </a></h3>
  <br>

    <h4><a style="float:left;text-align:left;">PODPISY: </a></h4>
    <br>
    <h4><a style="float:left;text-align:left;">Sporzadzil: ....................................... Sprawdzil:  ............................................. </a></h4>