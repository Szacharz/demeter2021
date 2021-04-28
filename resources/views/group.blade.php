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
         
<div class="container">
<form class="center" >
  <div class="form-group mb-2" align="center">
  
    <h1><i class="fa fa-list"></i> PROJEKTY GRUPOWE</h1>
    <p> Lista zadań, do których przypisana jest grupa. </p>
  </div>
</form>





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
