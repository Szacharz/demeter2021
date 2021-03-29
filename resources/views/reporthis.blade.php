@extends('layouts.admin')


<!-- Bootstrap library -->


@section('content')
<!-- Content Header (Page header) -->



<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dmeter. System wpisów-zadań.</h1>
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

} );
</script>


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
                <th class="hidden">ID-usterki</th>
            </tr>
        </thead>
        @foreach($usterki as $row)
   </div>  
      <tr>
        <td></td>
        <td>{{$row['data']}}</td>
        <td>{{$row['tresc']}}</td>
        <td>{{$row['deadline']}}</td>
        <td>{{$row['autor']}}</td>
        <td>{{$row['finisher']}}</td>
        <td>{{$row['place']}}</td>
        <td class= "text-success" >{{$row['status']}}</td>
        <td class="hidden">{{$row['id_usterki']}}
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
