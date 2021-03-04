@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dmeter. System wpisów-zadań. </h1>
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
                <h3>Dodawanie wpisu </h3>
                <p> Dodaj nowe zgłoszenie  </p>
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
                <h3>Lista Wpisów <sup style="font-size: 20px"></sup></h3>
                <p> Podgląd wszystkich wpisów <p>
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

              <!-- /.card-body -->
            </div>
            <div class="row">
  <div class="col-md-4">

  <h1> Moje Wpisy </h1>
  <div class="table table-striped table-bordered text-center table-hover table-responsive-lg ">
<table class="table" id="tabela_usterek" name="tabela_usterek">
      <tr class="success">
      <th scope="col">Id </th>
        <th>Treść</th>
        <th>Data</th>
        <th>Deadline</th>
        <th>Autor</th>
        <th>Miejsce</th>
        <th>Status</th>
        
      </tr>
     
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        
      </tr>
   
    </table>

  </div>
  </div>

  <div class="col-md-4 ml-auto"> 
  <h1> Zadania "na później" </h1>
  Poniżej znajduję się tabela z zadaniami, które się "nie pala"
            <div class="table table-striped table-bordered text-center table-hover table-responsive-lg ">
<table class="table" id="tabela_usterek" name="tabela_usterek">
      <tr class="success">
      <th scope="col">Id </th>
        <th>Treść</th>
        <th>Data</th>
        <th>Deadline</th>
        <th>Autor</th>
        <th>Miejsce</th>
        <th>Status</th>
        
      </tr>
   
   
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        
      </tr>

    </table>
  </div>
  </div>
  </div>
  </div>           <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

      
    </section>
    <!-- /.content -->
@endsection
