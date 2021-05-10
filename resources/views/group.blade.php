@extends('layouts.admin')


<!-- Bootstrap library -->

<?php header('Refresh: 300'); ?>

@section('content')


    <!-- Main content -->
    <section class="content">



          <style>
a
{text-decoration: none;
 background-color: none;
 color:black; }

 .cell-breakWord {
  word-break: break-word;
 }

</style>          
         
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
  
    <h1><i class="fa fa-list"></i> Projekty grupowe</h1>
    <p> Lista zadań do których przypisana jest grupa. </p>
  </div>
</form>


<table class="table table-striped table-bordered text-center table-hover table-responsive-xl"  id="usterki"> 
     <thead>
      <tr>
      <th>LP</th>
      <th>Data</th>
      <th>Treść</th>
      <th>Deadline</th>
      <th>Autor</th>
      <th>Status</th>
      <th>Notatki</th>
      <th>Edytuj</th>
      <th>Zakończ</th>
      </tr>
      </thead> 
      <tr>
        <td></td>
        <td></td>
        <td class="cell-breakWord"></td>
        <td>}</td>
        <td></td>
        <td class= "text-danger">}</td>
        <td class= "text-info"></td>
        <td>
          <a href={{"edit/".$row['id_usterki']}} class="btn btn-default">Edytuj</a>
          </td>
        <td>
        <a href={{"Change/".$row['id_usterki']}} class="btn btn-default" >Zakończ</a>
        </td>
      </tr>
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
