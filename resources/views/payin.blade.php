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
       

   
    

   <div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <!-- Form -->
            <form class="form-example" action="/usterkisubmit" method="POST">
                <h1>Forumlarz nowego zgłoszenia</h1>
                <p class="description">Dodaj nowe zdarzenie, wypełniajac formularz.</p>
                <!-- Input fields -->
                <div class="form-group">
                    <label for="place">Miejsce usterki:</label>
                    <input type="text" class="form-control" id="place" placeholder="Username..." name="place">
                </div>
                <div class="form-group">
                    <label for="data">Data zdarzenia:</label>
                    <input type="date" class="form-control" id="data"  name="data">
                </div>
                <div class="form-group">
                    <label for="tresc">Opis Zdarzenia:</label>
                    <input type="text" class="form-control" id="tresc" placeholder="Podaj treść zgłoszenia..." name="tresc">
                </div>
                <div class="form-group">
                    <label for="autor">Autor:</label>
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
                
                <button type="submit" class="btn btn-primary btn-customized">Dodaj usterkę</button>
                <!-- End input fields -->
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
