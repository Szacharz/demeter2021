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
            <h1 class="m-0 text-dark">Demeter</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Strona główna</a></li>
              
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
                <h3>Dodawanie wpłaty </h3>
                <p> Dodaj nowy przychód </p>
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
                <h3>Dodaj wypłatę <sup style="font-size: 20px"></sup></h3>
                <p> Dodaj nowy rozchód <p>
              </div>
              <div class="icon">
                
              </div>
              <a href="payout" class="small-box-footer">Kliknij by przejść dalej <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Raport </h3>

                <p>Kliknij, by utworzyć Raport </p>
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
                <h3>Historia Raportów</h3>

                <p>Kliknij, aby przejrzeć historię raportów</p>
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
  width: 50%;
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
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}
</style>


<div class="form-inline">

  <table>
  <tr>

    <td><h3> Kliknij, aby wygenerować raport wpłat i rozchodów </h3> </td>
    <i class="nav-icon fa fa-hand-point-right "></i> 
<td><div button>
<a class="btn btn-primary" target="_blank" href="{{ URL::to('/report/pdf') }}" >Generuj PDF</a> </td>
</tr>
</table>
</div>
</div>

 
<br /> <br /> 
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6 d-flex justify-content-center">
      <div class="card" style="width: 20rem;>
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
        <div class="row align-items-center">
        <div class="col-md-11">
                    <h2>Tabela wpłat</h2>
             </div>
             <div class="col-md-1">
                   <i class="fa fa-question-circle float-right"></i>
             </div>
             </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 d-flex justify-content-center">
      <div class="card" style="width: 20rem;>
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
        <div class="row align-items-center">
        <div class="col-md-11">
                    <h2>Tabela rozchodów</h2>
             </div>
             <div class="col-md-1">
                   <i class="fa fa-question-circle float-right"></i>
             </div>
             </div>
          
          
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="column">
  <div id = "tabela_wplat">
  <table style="width: 100%; display: table; table-layout: fixed;" class="table table-striped table-bordered text-center table-hover table-responsive">
      <tr>
        <th>Id</th>
        <th>Numer wpłaty</th>
        <th>Data</th>
        <th>Treść</th>
        <th>Kwota przychodu</th>
        <th>Edytuj</th>
        <th>Usuń</th>
      </tr>
      @foreach($wplata as $row)
     
      <tr>
        <td>{{$row['id']}}</td>
        <td>{{$row['numer_wplaty']}}</td>
        <td>{{$row['data']}}</td>
        <td>{{$row['tresc']}}</td>
        <td>{{$row['kwota_przychodu']}}</td>
        <td>
          <a href={{"edit/".$row['id']}} target="_blank">Edytuj</a>
          </td>
        <td>
        <a href={{"delete/".$row['id']}} >Usuń</a>
        </td>
      </tr>
      @endforeach
      <tr>
        
    </table>
  </div>
  </div>
  <div class="column">
  <table style="width: 100%; display: table; table-layout: fixed;" class="table table-striped table-bordered text-center table-hover table-responsive">
    
      <tr>
        <th>Id</th>
        <th>Numer wypłaty</th>
        <th>Data</th>
        <th>Treść</th>
        <th>Kwota rozchodu</th>
        <th>Edytuj</th>
        <th>Usuń</th>
      </tr>
      @foreach($wyplata as $row)
      <tr>
          <td>{{$row['id']}}</td>
          <td>{{$row['numer_wyplaty']}}</td>
          <td>{{$row['data']}}</td>
          <td>{{$row['tresc']}}</td>
          <td>{{$row['kwota_rozchodu']}}</td>
          <td>
          <a href={{"edit2/".$row['id']}}>Edytuj</a>
          </td>
          <td>
          <a href={{"delete2/".$row['id']}} >Usuń</a>
          </td>
      </tr>
      @endforeach
    </table>
    
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