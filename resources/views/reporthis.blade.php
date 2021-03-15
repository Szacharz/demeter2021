@extends('layouts.admin')
<head> <link rel = "icon" href = "https://www.flaticon.com/premium-icon/icons/svg/2883/2883199.svg"  type = "image/x-icon">
</head>
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dmeter. System wpisów-zadań.</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
              <!-- dodanie po prawej stronie w headzie, nie main headzie -->
              <ol class="breadcrumb float-sm-right">
          
              
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
                <h3>Lista wpisów <sup style="font-size: 20px"></sup></h3>
                <p> Podgląd listy wpisów <p>
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
                <h3>Placeholder </h3>

                <p>Placeholder</p>
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
                <h3>Archiwum</h3>

                <p>Przegląd archiwalnych wpisów</p>
              </div>
              <div class="icon">
              
              </div>
              <a href="reporthis" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
               

              

           
           

            
               


<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<div class="container">
<form class="center" >
  <div class="form-group mb-2" align="center">
    <h1> Archiwalne- wykonane wpisy</h1>
  </div>
</form>
<table id="example" class="table table-striped table-bordered text-center table-hover table-responsive-lg" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Treść</th>
                <th>Data</th>
                <th>Deadline</th>
                <th>Autor</th>
                <th>Miejsce</th>
                <th>Status</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
        </thead>
        @foreach($usterki as $row)
   </div>  
      <tr>
        <td>{{$row['id_usterki']}}.</td>
        <td>{{$row['tresc']}}</td>
        <td>{{$row['data']}}</td>
        <td>{{$row['deadline']}}</td>
        <td>{{$row['autor']}}</td>
        <td>{{$row['place']}}</td>
        <td class= "text-success" >{{$row['status']}}</td>
       
        <td>
          <a href={{"edit/".$row['id_usterki']}} class="btn btn-default">Edytuj</a>
          </td>
        <td>
        <a href={{"delete/".$row['id_usterki']}} class="btn btn-default" >Usuń</a>
        </td>
      </tr>
      @endforeach
    </table>
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


