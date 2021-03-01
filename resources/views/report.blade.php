@extends('layouts.admin')
<script src="js/jquery.min.js"></script>

<!-- Bootstrap library -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="bootstrap/js/bootstrap.min.js"></script>
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
               
          <style>
* {
  box-sizing: border-box;
}

.row {
  margin-left:-5px;
  margin-right:-5px;
}
  
.column {
  float: left;
  width: 100%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other on screens that are smaller than 600 px */
@media screen and (max-width: 1200px) {
  .column {
    width: 100%;
  }
}
</style>



 
<br /> <br />  
<div class="row h-100 justify-content-center align-items-center">
<h1> Wszystkie zgłoszenia </h1>
</div>


<div class="col-md-4">
<div class="form group row">
                    <label for="date" class="col-form-label-col-sm-2">Zakres dat od: </label>
                    <div class="col-sm-3">
                    <input type="date" class="form-control-input-sm" id="dataod" name="dataod" required/>
                    </div>
                    {!! "&nbsp;" !!} {!! "&nbsp;" !!}
                    <label for="date" class="col-form-label-col-sm-2">Zakres daty do:</label>
                    <div class="col-sm-3">
                    <input type="date" class="form-control-input-sm" id="datado" name="datado" required/>
                    </div>
                    
                    <div class="col-sm-2">
                      <button type="submit"  name="search" title="search"> Wyszukaj <img src="./img/search.png" width =15, height = 15  alt="search">
                      </div>
</div>
</div>
<!--  poczatek szukajki 

   

koniec szukajki-->

<div class="table table-striped table-bordered text-center table-hover table-responsive-lg">
<table class="table" id="tabela_usterek" name="tabela_usterek">
      <tr class="success">
      <th scope="col">Id </th>
        <th>Treść</th>
        <th>Data</th>
        <th>Deadline</th>
        <th>Autor</th>
        <th>Miejsce</th>
        
        <th>Status</th>
        <th>Edytuj</th>
        <th>Usuń</th>
      </tr>
      @foreach($usterki as $row)
   </div>  
      <tr>
        <th scope="row">{{$row['id_usterki']}}.</th>
        <td>{{$row['tresc']}}</td>
        <td>{{$row['data']}}</td>
        <td>{{$row['deadline']}}</td>
        <td>{{$row['autor']}}</td>
        <td>{{$row['place']}}</td>
        <td>{{$row['status']}}</td>
       
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
  </div>

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