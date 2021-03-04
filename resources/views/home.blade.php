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
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
            <div class="container">
            <div class="column">
            <div class="col-xs-1" align="center">
            <h1> Witaj na stronie głównej! </h1>
            1) Wybierz zakładkę "Dodawanie wpisu", jeśli chcesz dodać nowy Wpis.
            
            </div>
            <div class="col-xs-1" align="center">
            2) Możesz podejrzeć wszystkie dodane wpisy w zakładce "Lista Wpisów", oraz dokonać edycji. 
            </div>
            <div class="row"><br></br></div>
            <div class="col-xs-1" align="center">
  <h2> Sprawdź zadania, które zostały odłożone na później*.  </h2>
  </div>
  *Poniżej znajduję się tabela z zadaniami, w których deadline został wyznaczony na <b>późniejszy termin.</b> 
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
   
      @foreach($usterkilate as $row)
      <tr>
        <td>{{$row['id_usterki']}}.</td>
        <td>{{$row['tresc']}}</td>
        <td>{{$row['data']}}</td>
        <td>{{$row['deadline']}}</td>
        <td>{{$row['autor']}}</td>
        <td>{{$row['place']}}</td>
        <td class= "text-danger" >{{$row['status']}}</td>
        
      </tr>
      @endforeach
    </table>
    <div class="d-flex justify-content-center">
    {!! $usterkilate->links() !!}
</div>
  </div>
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
