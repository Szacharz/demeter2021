@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      
               
         
          <script>
$(document).ready(function() {
    var t = $('#example').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0,
            "render": function(data, type, row) {return '<button class="btn btn-primary" data-toggle="modal" data-id="'+row.id+'" data-fieldname="'+row.fieldname+'" data-target="#myModal">'+data+'</button>'} 
        } ],
        "lengthMenu": [[-1, 10, 25, 50], ["All", 10, 25, 50, ]],
        "order": [[ 1, 'asc' ]],
        
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    
    /* -> OnClick event, gdyby był potrzebny z wykorzystaniem MODALU.
    t.on('click', 'td', function () {
      
        var tresc =$(this).closest('tr').find('td:eq(2)').html();
        var id =$(this).closest('tr').find('td:eq(8)').html();
      $('#addNote').attr('action', '/addNote')
       window.$('#modal-id').modal("show");
       $(".ptresc").html("src","");
       $(".ptresc").html("<b> 1. Treść wpisu:     </b>"+tresc);

       $(".pid").html("src","");
       $(".pid").html("<b> 3. ID wpisu:     </b>"+id);
    });
    */

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
</style>  

<br /> <br />  
<div class="container">
<form class="center" >
  <div class="form-group mb-2" align="center">
    <h1> Archiwalne- wykonane wpisy</h1>
    <p> Tabela zawiera wpisy uznane za zakończone. </p>
  </div>
</form>
<table id="example" class="table table-striped table-bordered text-center table-hover table-responsive-lg">
        <thead>
            <tr >
                <th>LP</th>
                <th>Data</th>
                <th>Treść</th>
                <th>Deadline</th>
                <th>Autor</th>
                <th>Zakończył</th>
                <th>Miejsce</th>
                <th>Status</th>
            </tr>
        </thead>
        @foreach($usterki as $row)
   </div>  
      <tr>
        <td></td>
        <td><a href={{"note/".$row['id_usterki']}}>{{$row['data']}}</td>
        <td><a href={{"note/".$row['id_usterki']}}>{{$row['tresc']}}</td>
        <td><a href={{"note/".$row['id_usterki']}}>{{$row['deadline']}}</td>
        <td><a href={{"note/".$row['id_usterki']}}>{{$row['autor']}}</td>
        <td><a href={{"note/".$row['id_usterki']}}>{{$row['finisher']}}</td>
        <td><a href={{"note/".$row['id_usterki']}}>{{$row['place']}}</td>
        <td class= "text-success" >{{$row['status']}}</td>
      </tr>
      @endforeach
      </table>

</div>

<div class="modal fade" id="modal-id" role="dialog">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
 
    <div class="modal-header">
      <h4 class="modal-title">Karta Wpisu</h4>
    </div>


    <form  id="notatkisubmit" action="/notatkisubmit" method="POST">
      @csrf
    <div class="modal-body">
      <div class="clearfix ptresc"></div>

             <div class><p><b>2. Notatki: </b></p><span></span></div>  
            
             <div class="pid" id="id_usterki"></div>

             <textarea class="form-control" name="tresc_nt" id="tresc_nt" placeholder="Wprowadź tekst notatki"></textarea>
             </div>
             

    <div class="modal-footer">
    <button type="submit" class="btn btn-success">Dodaj nową notatkę</button>
    <button type="button" class="btn btn-primary" data-dismiss="modal">Zamknij</button>
    </div>
  </div>
   </form>
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
