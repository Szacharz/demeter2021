@extends('layouts.admin')
<head> <link rel = "icon" href = "https://www.flaticon.com/premium-icon/icons/svg/2883/2883199.svg"  type = "image/x-icon"></head>
@section('content')


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
            <h1 class="m-0 text-dark">Dmeter. System wpisów-zadań.</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Strona główna</a></li>
              
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
                <h3>Dodawanie wpisu</h3>
                <p> Dodaj nowe zgłoszenie </p>
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
                <p> Podgląd listy zgłoszeń <p>
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
            <a href="report">
              <div class="inner">
              <div class="container">
                <h3>Placeholder </h3>

                <p>Placeholder </p>
              </div>
              <div class="icon">
              </div>
              </div>
              <a href="report" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
            <a href="#">
              <div class="inner">
              <div class="container">
                <h3>Placeholder</h3>

                <p>Placeholder</p>
              </div>
              <div class="icon">
              </div>
              </div>
              <a href="#" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
               

              

    
            
               
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        

 <script>
$(function () {
  $('#today').datetimepicker();
});
</script>
   
    

   <div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <!-- Form -->
            @if(count($errors)>0)
           <ul>
      @foreach($errors->all() as $error)
    <li class="alert alert-danger">{{$error}}</li>
    @endforeach
    </ul>
    @endif
            <form class="form-example" action="/usterkisubmit" method="POST">
            @csrf
                <h1>Forumlarz nowego wpisu</h1>
                <p class="description">Dodaj nowy Wpis, wypełniajac formularz.</p>
                <!-- Input fields -->
                <div class="form-group">
                    <label for="tresc">Opis wpisu:</label>
                    <input type="text" class="form-control" id="tresc" placeholder="Podaj treść wpisu..." name="tresc">
                </div>
                <div class="form-group">
                    <label for="data">Data wpisu:</label>
                    <input type="date" class="form-control" id="data"  name="data"  value="<?php echo date('Y-m-d'); ?>" />
                </div>
                <div class="form-group">
                    <label for="deadline">Deadline</label>
                    <select class="form-control" name="deadline" id="deadline">
                    <option>Dziś</option>
                    <option>Jutro</option>
                    <option>Ten Tydzień</option>
                    <option>Później</option>
                    </select>
                    </div>
                <div class="form-group">
                    <label for="place">Miejsce zdarzenia (Opcjonalne):</label>
                    <input type="text" class="form-control" id="place" placeholder="Wpisz miejsce zdarzenia..." name="place">
                </div>
                <div class="form-group">
                    <label for="autor">Autor:</label>
                    <select class="form-control" name="autor" id="autor" >
                    <option>{{Auth::user()->name }}</option>
    </select>
    </div>
                        <div class="form-group">
                        <label for="autor">Status:</label>
                        <select class="form-control text-danger" name="status" id="status">
                   <option>Niewykonane</option>
                 </select>
    </div>
                <button type="submit" class="btn btn-default">Dodaj wpis</button>
                <!-- End input fields -->
                </form>
                </div>
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
