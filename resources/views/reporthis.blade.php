@extends('layouts.admin')

@section('content')
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
                <h3>Lista zgłoszeń <sup style="font-size: 20px"></sup></h3>
                <p> Podgląd listy zgłoszeń <p>
              </div>
              <div class="icon">
                
              </div>
              <a href="report" class="small-box-footer">Kliknij by przejść dalej <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Placeholder </h3>

                <p>Placeholder</p>
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
            <form action="reporthis" method = "POST">
            @csrf
            <br>
            <div class="container">
              <div class="row">
                <div class="container-fluid">
                  <div class="form group row">
                    <label for="date" class="col-form-label-col-sm-2">Zakres dat od: </label>
                    <div class="col-sm-3">
                    <input type="date" class="form-control-input-sm" id="dataod" name="dataod" required/>
                    </div>
                    {!! "&nbsp;" !!} {!! "&nbsp;" !!}
                    <label for="date" class="col-form-label-col-sm-2">Zakres daty do:</label>
                    <div class="col-sm-3">
                    <input type="date" class="form-control-input-sm" id="datado" name="datado" required/>
                    </div>
                    
                    <div class="col-sm-2">
                      <button type="submit"  name="search" title="search"> Wyszukaj <img src="./img/search.png" width =15, height = 15  alt="search">
                      </div>
                      </div>
                      </div>
                      </div>
                      </div>
                      <br>
                      
                      </form>

                      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Numer wpłaty</th>
                <th>Data</th>
                <th>Opis</th>
                <th>Kwota wpłaty</th>
                
            </tr>
        </thead>
        <tbody>
        @foreach($wplata as $row)
            <tr>
            <td>{{$row['id']}}</td>
        <td>{{$row['numer_wplaty']}}</td>
        <td>{{$row['data']}}</td>
        <td>{{$row['tresc']}}</td>
        <td>{{$row['kwota_przychodu']}}</td>
               
            </tr>
          @endforeach
            
            </tr>
        </tbody>
        <tfoot>
            <tr>
            <th>ID</th>
                <th>Numer wpłaty</th>
                <th>Data</th>
                <th>Opis</th>
                <th>Kwota wpłaty</th>
            </tr>
        </tfoot>
    </table>

             <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    
    @endsection


