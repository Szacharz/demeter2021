@extends('layouts.admin')

@section('content')
<script type="text/javascript" src="{{asset('js/require.js')}}"></script>

<style>
            .center {
  text-align: center;

}
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Demeter</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Strona główna</a></li>
              
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
              <div class="inner">
                <h3>Dodawanie usterki </h3>
                <p> Dodaj nowe zgłoszenie </p>
              </div>
              <div class="icon">
              
              </div>
              <a href="payin" class="small-box-footer">Kliknij by przejść dalej <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Placeholder <sup style="font-size: 20px"></sup></h3>
                <p> Placeholder <p>
              </div>
              <div class="icon">
                
              </div>
              <a href="payout" class="small-box-footer">Kliknij by przejść dalej <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Placeholder </h3>

                <p>Placeholder </p>
              </div>
              <div class="icon">
         
              </div>
              <a href="report" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Placeholder</h3>

                <p>Placeholder</p>
              </div>
              <div class="icon">
              
              </div>
              <a href="reporthis" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
               

              

    
            
               
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div id="menu">

   
    <div id="container">
    <h2> Wprowadzanie nowej awarii (usterki) </h2>
    @if(count($errors)>0)
    <ul>
      @foreach($errors->all() as $error)
    <li class="alert alert-danger">{{$error}}</li>
    @endforeach
    </ul>
    @endif
   <form class="form-horizontal" action="/usterkisubmit" method="POST">
   @csrf


   <div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
        <form class="form-example" action="" method="post">
   <div class="form-group">
{!! "&nbsp;" !!} {!! "&nbsp;" !!} {!! "&nbsp;" !!} <label class="control-label col-sm-2" for="tresc">Miejsce usterki:
<div class="col-sm-10"> 
   <input type="text" name="place" class="form-control" placeholder="Gdzie?" id="place" > </label>
   </div>
    </div>

   <div class="center">
   <label class="control-label col-sm-2" for="data">Data:
   <div class="col-sm-10">
   <input type="date" name="data" class="form-control" id="data"> </label>
  </div>
</div>


<div class="form-group">
<label class="control-label col-sm-2" for="tresc">Opis:
<div class="col-sm-10"> 
   <input type="text" action="#" name="tresc" class="form-control" placeholder="Opis" id="tresc" > </label>
   </div>
    </div>

 
    <div class="form-group">
    <label for="userselect"> Autor: </LABEL>
    {!! "&nbsp;" !!}{!! "&nbsp;" !!}
    <select class="form-control" name="autor" id="autor">
    <option>Miłosz</option>
    <option>Darek</option>
    <option>Michał</option>
    <option>Artur</option>
    <option>Jakub</option>
    <option>Szymon</option>
    <option>Dominik</option>
    </select>
    </div>


   <button type="submit" class="btn btn-default">Dodaj usterkę</button>
 

   </form> 
   </div>
    </div>
</div>

   <div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <!-- Form -->
            <form class="form-example" action="" method="post">
                <h1>Bootstrap 4: Align Center</h1>
                <p class="description">A tutorial on how to align a "form" vertically and horizontally in Bootstrap 4.</p>
                <!-- Input fields -->
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control username" id="username" placeholder="Username..." name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control password" id="password" placeholder="Password..." name="password">
                </div>
                <button type="submit" class="btn btn-primary btn-customized">Login</button>
                <!-- End input fields -->
                <p class="copyright">&copy; Bootstrap 4 "Align Center" tutorial by <a href="https://azmind.com">AZMIND</a>.</p>
            </form>
            <!-- Form end -->
        </div>
    </div>
</div>





          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  
    @endsection
