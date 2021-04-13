@extends('layouts.admin')


<!-- Bootstrap library -->


@section('content')



    <!-- Main content -->
    <section class="content">

      <!--Niżej są karty, gdybym potrzebował
           <div class="container-fluid">
        Small boxes (Stat box)
        <div class="row">
          <div class="col-lg-3 col-6">
            small box 
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
        
          <div class="col-lg-3 col-6">
           
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
       
          <div class="col-lg-3 col-6">
         
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
      
         <div class="col-lg-3 col-6">
         
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
          -->




          <style>
a
{text-decoration: none;
 background-color: none;
 color:black; }
</style>          
         
          <script>
$(document).ready(function() {
    var t = $('#usterki').DataTable( {
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
} );
</script>

<br /> <br />  
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

<div class="container">
<form class="center" >
  <div class="form-group mb-2" align="center">
    <h1> Przedawnione wpisy </h1>
    <p> Lista wpisów które przekroczyły swój deadline. (tymczasowo - dzisiejsze wpisy) </p>
  </div>
</form>


<table class="table table-striped table-bordered text-center table-hover table-responsive-lg" id="usterki"> 
     <thead>
      <tr>
      <th>LP</th>
      <th>Data</th>
      <th>Treść</th>
      <th>Deadline</th>
      <th>Autor</th>
      <th>Miejsce</th>
      <th>Status</th>
      <th>Notatki</th>
      <th>Edytuj</th>
      <th>Zakończ</th>
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
        <td><a href={{"note/".$row['id_usterki']}}>{{$row['place']}}</td>
        <td class="text-danger">{{$row['status']}}</td>
        <td class="text-info">            </td>
        <td>
          <a href={{"edit/".$row['id_usterki']}} class="btn btn-default">Edytuj</a>
          </td>
        <td>
        <a href={{"Change/".$row['id_usterki']}} class="btn btn-default" >Zakończ</a>
        </td>
      </tr>
      @endforeach
    </table>

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