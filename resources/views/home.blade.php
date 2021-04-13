@extends('layouts.admin')


<!-- Bootstrap library -->


@section('content')
<!-- Content Header (Page header) -->

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
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
    

               
         

          <script>
$(document).ready(function()
     {
    var t = $('#later').DataTable(
       {
        "autoWidth": true,
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "lengthMenu": [[-1, 10, 25, 50], ["All", 10, 25, 50]],
        "order": [[ 1, 'asc' ]]
    } );
    
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );

    } ).draw();
} );
</script> 


            <div class="container">
            
            <div class="column">
            
           <p class="text-info"> 13-04-2021   1. Dodano możliwość zmiany hasła w panelu bocznym po kliknięciu na nazwę użytkownika. </p>
           <p class="text-info"> 13-04-2021   2. Zmieniono ogólny wygląd strony. </p>
            <div class="col-xs-1" align="center">
            <h1> Witaj na stronie głównej! </h1>
  <h2> Sprawdź zadania, które zostały odłożone na później*.  </h2>
  </div>
  *Poniżej znajduję się tabela z zadaniami <b>Niewykonanymi</b>, lub <b>W trakcie</b>, w których deadline został wyznaczony na <b>późniejszy termin.</b> 
  </div>


<br> </br>


<table class="table table-striped table-bordered text-center table-hover table-responsive" cellspacing="0" style="width:100%"  id="later">
     <thead>
      <tr>
      <th scope="col">Id </th>
        <th>Data</th>
        <th>Treść</th>
        <th>Deadline</th>
        <th>Autor</th>
        <th>Miejsce</th>
        <th>Status</th>     
      </tr>
   </thead>
   <tbody>
      @foreach($usterkilate as $row)
      <tr>
        <td></td>
        <td>{{$row['data']}}</td>
        <td>{{$row['tresc']}}</td>
        <td>{{$row['deadline']}}</td>
        <td>{{$row['autor']}}</td>
        <td>{{$row['place']}}</td>
        <td class= "text-danger" >{{$row['status']}}</td>
      </tr>
      @endforeach
      </tbody>
    </table>

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
