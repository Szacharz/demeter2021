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
    var t = $('#usersi').DataTable(
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

<style>
a
{text-decoration: none;
 background-color: none;
 color:black; }

 .cell-breakWord {
  word-break: break-word;
 }

</style>


@if(Auth::user()->role== "Admin")

<div class="container-xl">
            
            <div class="column"> <!-- przez to że jest zamknięta w kolumnie, jest mniejsza datatabela -->
  
            <div class="col-lg" align="center">
            <h1><i class="fa fa-shield"></i> Zarządzanie użytkownikami </h1>
  <h2>   </h2>
  </div>
  *Do tej części strony dostęp mają tylko administratorzy serwisu Dementor.
  </div>
  <br> </br>
  <div class="card">
              <div class="card-header">
              <h3> Zarządzanie użytkownikami</h3>
              </div> 
              <div class="card-body">
              <table class="table table-striped table-bordered text-center table-hover table-responsive-lg" id="usersi"> 
     <thead>
      <tr>
      <th>LP</th>
      <th>Nazwa użytkownika</th>
      <th>Rola</th>
      <th>Email</th>
      <th>Utworzono</th>
      <th>Update</th>
      </tr>
      </thead>
      @foreach($users as $row)
   </div>  
      <tr>
        <td></td>
        <td>{{$row['name']}}</td>
        <td>{{$row['role']}}</td>
        <td>{{$row['email']}}</td>
        <td>{{$row['created_at']}}</td>
        <td>{{$row['updated_at']}}</td>
      </tr>
      @endforeach
    </table>



                
            </div>
            </div>


@else
            <div class="container-xl">
            
            <div class="column"> <!-- przez to że jest zamknięta w kolumnie, jest mniejsza datatabela -->
  
            <div class="col-lg" align="center">
            <h1><i class="fa fa-shield"></i> Zarządzanie użytkownikami </h1>
  <h2>   </h2>
  </div>
  Do tej części strony dostęp mają tylko administratorzy serwisu Dementor.
  </div>


<br> </br>
@endif
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
