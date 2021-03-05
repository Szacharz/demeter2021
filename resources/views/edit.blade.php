@extends('layouts.admin')

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
              <div class="inner">
                <h3>Dodawanie wpisu</h3>
                <p> Dodaj nowe zgłoszenie</p>
              </div>
              <div class="icon">
              
              </div>
              <a href="http://dmeter/payin" class="small-box-footer">Kliknij by przejść dalej <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Lista zgłoszeń <sup style="font-size: 20px"></sup></h3>
                <p> Podgląd i edycja listy zgłoszeń <p>
              </div>
              <div class="icon">
                
              </div>
              <a href="http://dmeter/report" class="small-box-footer">Kliknij by przejść dalej <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Placeholder</h3>

                <p>Placeholder</p>
              </div>
              <div class="icon">
         
              </div>
              <a href="http://dmeter/report" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
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
              <a href="http://dmeter/report" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
               
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
            <form class="form-example" action="/edit" method="POST">
            @csrf
            <input type="hidden" name="id_usterki" id="id_usterki" value="{{$usterki['id_usterki']}}">
         
                <h1>Edycja Wpisu o ID: {{$usterki['id_usterki']}}</h1>
                <p class="description">Dodaj nowy Wpis, wypełniajac formularz.</p>
                <!-- Input fields -->
                <div class="form-group">
                    <label for="tresc">Opis wpisu:</label>
                    <input type="text" class="form-control" id="tresc" placeholder="Podaj treść wpisu..." name="tresc" value="{{$usterki['tresc']}}">
                </div>
                <div class="form-group">
                    <label for="data">Data wpisu:</label>
                    <input type="date" class="form-control" id="data"  name="data"  value="{{$usterki['data']}}" >
                </div>
                <div class="form-group">
                    <label for="deadline">Deadline</label>
                    <select class="form-control" name="deadline" id="deadline" value="{{$usterki['deadline']}}">
                    <option>Dziś</option>
                    <option>Jutro</option>
                    <option>Ten Tydzień</option>
                    <option>Później</option>
                    </select>
                    </div>
                <div class="form-group">
                    <label for="place">Miejsce zdarzenia (Opcjonalne):</label>
                    <input type="text" class="form-control" id="place" placeholder="Wpisz miejsce zdarzenia..." name="place" value="{{$usterki['place']}}">
                </div>
                <div class="form-group">
                    <label for="autor"></label>
                    <input type="hidden" class="form-control"   name="autor" id="autor" value="{{$usterki['autor']}}" >
                </div>
    
                     <div class="form-group">
                        <label for="autor">Status:</label>
                        <select class="form-control text-danger" name="status" id="status">
                   <option>Wykonane</option>
                  <option>W trakcie</option>
                  <option>Niewykonane</option>
                     </select>
    </div>
                
                <button type="submit" class="btn btn-default">Edytuj wpis</button>
                <!-- End input fields -->
                </form>
                </div>
            </form>
            <!-- Form end -->
        </div>
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