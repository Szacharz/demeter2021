@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dementor. System wpisów-zadań.</h1>
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
      <a href="http://dementor/payin">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Dodawanie wpisu</h3>
                <p> Dodaj nowe zgłoszenie</p>
              </div>
              <div class="icon">
              
              </div>
              <a href="http://dementor/payin" class="small-box-footer">Kliknij by przejść dalej <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
            <a href="http://dementor/report">
              <div class="inner">
                <h3>Lista zgłoszeń <sup style="font-size: 20px"></sup></h3>
                <p> Podgląd i edycja listy zgłoszeń <p>
              </div>
              <div class="icon">
                
              </div>
              <a href="http://dementor/report" class="small-box-footer">Kliknij by przejść dalej <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
            <a href="http://dementor/payout">
              <div class="inner">
                <h3>Lista Prywatna</h3>

                <p>Podgląd prywatnych zadań</p>
              </div>
              <div class="icon">
         
              </div>
              <a href="http://dementor/payout" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
            <a href="reporthis">
              <div class="inner">
              <div class="container">
                <h3>Archiwum</h3>

                <p>Podgląd archiwalnych wpisów</p>
              </div>
              <div class="icon">
              </div>
              </div>
              <a href="http://dementor/reporthis" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <script>
          $(document).ready(function() {
                var t = $('#Notki').DataTable( {
                    "columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0,
                     "info": true,
                                               } ],
                  "lengthMenu": [[-1, 10, 25, 50], ["All", 10, 25, 50, ]],
                  "order": [[ 1, 'asc' ]]
                                  } );
                t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                 cell.innerHTML = i+1;
                                                     } );
                         } ).draw();
                    });
          </script>


          <div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <!-- Form -->
            @if(count($errors)>0)
           <ul>
      @foreach($errors->all() as $error)
    <li class="alert alert-danger">{{$error}}</li>
    @endforeach
    </ul>
    @endif
            <form class="form-example" action="/notesubmit" method="POST">
            @csrf
            <div class="card bg-light mb-3" style="max-width: 55rem;">
            <input type="hidden" name="id_usterki" id="id_usterki" value="{{$usterki['id_usterki']}}">
            
            <form class="form-inline">
          <div class="form-group mb-2">
           <div class="card-header"> <h1>Nazwa Wpisu: {{$usterki['tresc']}} </h1> </div>
           </div>
            <div class="card-body">
            <div class="form-group">
                    <label for="tresc">Informacje:</label>
                </div>
                <p class="card-text">  <b>1.</b> Karta Wpisu o <b>ID: {{$usterki['id_usterki']}}</b>   &nbsp&nbsp&nbsp&nbsp   <b> 2.</b> Autor wpisu:<b> {{$usterki['autor']}} </b> &nbsp&nbsp&nbsp&nbsp  <b> 3.</b> Status:<b> {{$usterki['status']}} </b> </p>
     
                </form>
                <p class="card-text"> <b> 4.</b> Tabela notatek:</p> 
                
                <form class="center" >
              <table id="Notki" class="table table-striped table-bordered text-center table-hover table-responsive-lg">
        <thead>
            <tr>
                <th>LP</th>
                <th>Treść</th>
                <th>Autor</th>
            </tr>
        </thead>
        @foreach($notatki as $row)
   </div>  
      <tr>
        <td></td>
        <td>{{$row['tresc_nt']}}</td>
        <td>{{$row['autor']}}</td>
      </tr>
      @endforeach
      </table>
                    <div>
                    </div>
                    <br>
                    </br>
                    <div class="form-group mb-2" align="center">
                <h3>Dodawanie nowej notatki</h3>
                <p> Dodaj nową notatkę, uzupełniając formularz. Potem Kliknij "Dodaj notatkę".</p>
                <!-- Input fields -->
                <div class="form-group">
                    <label for="tresc_nt">Treść notatki</label>
                    <textarea height="100%" class="form-control" name="tresc_nt" id="tresc_nt" placeholder="Wprowadź tekst notatki"></textarea>
                </div>
                <div class="form-group">
                    <label for="autor">Autor:</label>
                    <select type="hidden" class="form-control" name="autor" id="autor" >
                    <option>{{Auth::user()->name }}</option>
                </select>
                  </div>
                <button type="submit" class="btn btn-primary">Dodaj notatkę</button>
                <!-- End input fields -->
                </form>
                </div>
                </div>
                </div>
            </form>
            <!-- Form end -->
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