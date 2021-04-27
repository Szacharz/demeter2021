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

@if (session('success'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif

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
  
  <br> </br>
  <div class="card">
              <div class="card-header">
              <div class="col-lg" align="center">
            <h1><i class="fa fa-shield"></i> Zarządzanie użytkownikami </h1>
            <div class="form-group row">
            <a class="btn btn-info " href='http://dementor/newuser'role="button"><h6><i class="fa fa-plus"></i> Nowy użytkownik</h6></a>
            <div class="col-lg" align="center">
          *Do tej części strony dostęp mają tylko admini.
              </div>  
                </div>
              </div>
              <div>
              <div class="card-body">
              <table class="table table-striped table-bordered text-center table-hover table-responsive-lg" id="usersi"> 
     <thead>
      <tr>
      <th>LP</th>
      <th>Nazwa użytkownika</th>
      <th>Rola</th>
      <th>Email</th>
      <th>Utworzono</th>
      <th>Ostatnia zmiana</th>
      <th>Akcje</th>
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
        <td><a href={{"edit3/".$row['id']}} class="btn btn-warining" role="button"><h6><i class="fa fa-pencil"></i></h6></a>
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
