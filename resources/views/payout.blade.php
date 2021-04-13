@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">

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

          <script>
$(document).ready(function() {
    var t = $('#privaten').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "lengthMenu": [[-1, 10, 25, 50], ["All", 10, 25, 50, ]],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>

<br /> <br />  

<div class="container">
<form class="center" >
  <div class="form-group mb-2" align="center">
    <h1> Lista prywatna </h1>
    <p> Lista Twoich zadań, które zostały wybrane jako prywatne. </p>
  </div>
</form>

<style>
a
{text-decoration: none;
 background-color: none;
 color:black; }
</style>

<table class="table table-striped table-bordered text-center table-hover table-responsive-lg" id="privaten"> 
     <thead>
      <tr>
      <th>LP</th>
      <th>Data</th>
      <th>Treść</th>
      <th>Deadline</th>
      <th>Autor</th>
      <th>Miejsce</th>
      <th>Prywatne</th>
      <th>Status</th>
      <th>Edytuj</th>
      <th>Usuń</th>
      </tr>
      </thead>   
      @foreach($usterki as $row)
   </div>  
      <tr>
        <td></td>
        <td> <a href={{"note/".$row['id_usterki']}}>{{$row['data']}}</td></a>
        <td><a href={{"note/".$row['id_usterki']}}> {{$row['tresc']}}</td>
        <td><a href={{"note/".$row['id_usterki']}}> {{$row['deadline']}}</td>
        <td><a href={{"note/".$row['id_usterki']}}> {{$row['autor']}}</td>
        <td><a href={{"note/".$row['id_usterki']}}> {{$row['place']}}</td>
        <td><a href={{"note/".$row['id_usterki']}}> {{$row['private']}}</td>
        <td class= "text-danger" > {{$row['status']}}</td>
       
        <td>
          <a href={{"edit/".$row['id_usterki']}} class="btn btn-default">Edytuj</a>
          </td>
        <td>
        <a href={{"delete/".$row['id_usterki']}} class="btn btn-default" >Usuń</a>
        </td>
      </tr>
      @endforeach
    </table>                   
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div id="menu">

			
            <div id="container">
    <h2>  </h2>
  


          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  
    @endsection
