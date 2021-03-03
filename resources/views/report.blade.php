@extends('layouts.admin')
<script src="js/jquery.min.js"></script>

<!-- Bootstrap library -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="bootstrap/js/bootstrap.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

@section('content')
<!-- Content Header (Page header) -->



<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dmeter. System wpisów-zadań.</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Strona główna</a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Dodawanie wpisu </h3>
                <p> Dodaj nowe zgłoszenie </p>
              </div>
              <div class="icon">
              
              </div>
              <a href="payin" class="small-box-footer">Kliknij by przejść dalej <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Lista zgłoszeń <sup style="font-size: 20px"></sup></h3>
                <p> Podgląd listy zgłoszeń<p>
              </div>
              <div class="icon">
                
              </div>
              <a href="report" class="small-box-footer">Kliknij by przejść dalej <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Placeholder</h3>

                <p>Placeholder </p>
              </div>
              <div class="icon">
         
              </div>
              <a href="report" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Placeholder</h3>

                <p>Placeholder</p>
              </div>
              <div class="icon">
              
              </div>
              <a href="reporthis" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
               
         

 
<br /> <br />  

<form class="form-inline" type="post" action="{{url ('/search')}}">
  <div class="form-group mb-2">
    <h1> Wszystkie zgłoszenia </h1>
  </div>
  
  <div class="form-group mx-sm-3 mb-2">
  </div>
</form>


<link rel="stylesheet" type="text/css" href="css/tablesort.css">


<table class="table-sort table-sort-search">
      <tr>
      <th class="table-sort">Id </th>
      <th class="table-sort">Treść</th>
      <th class="table-sort">Data</th>
      <th class="table-sort">Deadline</th>
      <th class="table-sort">Autor</th>
      <th class="table-sort">Miejsce</th>
      <th class="table-sort">Status</th>
      <th class="th-sm" >Edytuj</th>
      <th class="th-sm" >Usuń</th>
      </tr>
      @foreach($usterki as $row)
   </div>  
      <tr>
        <td>{{$row['id_usterki']}}.</td>
        <td>{{$row['tresc']}}</td>
        <td>{{$row['data']}}</td>
        <td>{{$row['deadline']}}</td>
        <td>{{$row['autor']}}</td>
        <td>{{$row['place']}}</td>
        <td class= "text-danger" >{{$row['status']}}</td>
       
        <td>
          <a href={{"edit/".$row['id_usterki']}} class="btn btn-default">Edytuj</a>
          </td>
        <td>
        <a href={{"delete/".$row['id_usterki']}} class="btn btn-default" >Usuń</a>
        </td>
      </tr>
      @endforeach
      <tr>
        
    </table>
  </div>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script> 
  <script type="text/javascript" src="tablesort.js"></script> 
  <script type="text/javascript">
$(function () {
$('table.table-sort').tablesort();
});
</script>
  </div>
  </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @endsection
