@extends('layouts.admin')
<head>


</head>
@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dmeter. System wpisów-zadań. </h1>
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
            <a href="payin">
              <div class="inner">
              <div class="container">
                <h3>Dodawanie wpisu </h3>
                <p> Dodaj nowe zgłoszenie  </p>
              </div>
              <div class="icon">
              </div>
              </div>
              <a href="payin" class="small-box-footer">Kliknij by przejść dalej <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
            <a href="report">
              <div class="inner">
              <div class="container">
                <h3>Lista zgłoszeń <sup style="font-size: 20px"></sup></h3>
                <p> Podgląd wszystkich zgłoszeń <p>
              </div>
              <div class="icon">
                </div>
              </div>
              <a href="report" class="small-box-footer">Kliknij by przejść dalej <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
            <a href="payout">
              <div class="inner">
              <div class="container">
                <h3>Lista Prywatna </h3>

                <p>Podgląd prywatnych zadań </p>
              </div>
              <div class="icon">
              </div>
              </div>
              <a href="payout" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
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
              <a href="reporthis" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

              <!-- /.card-body -->
            </div>

            <script>
$(document).ready(function() {
  $('#later').DataTable( {
        "lengthMenu": [[-1, 5, 10, 25, 50], ["All", 5, 10, 25, 50 ]]
    } );
} );
</script> 
            <div class="container">
            
            <div class="column">
            <div class="col-xs-1" align="center">
            <h1> Witaj na stronie głównej! </h1>
            1) Wybierz zakładkę <b> "Dodawanie wpisu",</b> jeśli chcesz dodać nowy Wpis.
            
            </div>
            <div class="col-xs-1" align="center">
            2) Możesz podejrzeć wszystkie dodane wpisy w zakładce <b> "Lista Zgłoszeń", </b> oraz dokonać edycji. 
            </div>
            <div class="col-xs-1" align="center">
            3) Wszystkie <b>wykonane wpisy</b> znajdziesz w zakładce <b>Archiwum.</b>
            </div>
            <div class="row"><br></br></div>
            <div class="col-xs-1" align="center">
  <h2> Sprawdź zadania, które zostały odłożone na później*.  </h2>
  </div>
  *Poniżej znajduję się tabela z zadaniami, w których deadline został wyznaczony na <b>późniejszy termin.</b> 
  


  
<table class="table table-striped table-bordered text-center table-hover table-responsive-lg" id="later">
     <thead>
      <tr >

      <th scope="col">Id </th>
        <th>Treść</th>
        <th>Data</th>
        <th>Deadline</th>
        <th>Autor</th>
        <th>Miejsce</th>
        <th>Status</th>
        
      </tr>
   </thead>
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
      </tbody>
    </table>

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
