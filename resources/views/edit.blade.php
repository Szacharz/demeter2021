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
                <h3>Dodawanie wpłaty </h3>
                <p> Dodaj nowy przychód </p>
              </div>
              <div class="icon">
              
              </div>
              <a href="http://demeter.local/payin" class="small-box-footer">Kliknij by przejść dalej <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Dodaj wypłatę <sup style="font-size: 20px"></sup></h3>
                <p> Dodaj nowy rozchód <p>
              </div>
              <div class="icon">
                
              </div>
              <a href="http://demeter.local/payout" class="small-box-footer">Kliknij by przejść dalej <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Raport miesięczny</h3>

                <p>Kliknij, by utworzyć Raport miesięczny</p>
              </div>
              <div class="icon">
         
              </div>
              <a href="http://demeter.local/report" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Historia Raportów</h3>

                <p>Kliknij, aby przejrzeć historię raportów</p>
              </div>
              <div class="icon">
              
              </div>
              <a href="http://demeter.local/reporthis" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
               
          <div id="container">
    <h2> Eydcja dodanej usterki </h2>
    @if(count($errors)>0)
    <ul>
      @foreach($errors->all() as $error)
    <li class="alert alert-danger">{{$error}}</li>
    @endforeach
    </ul>
    @endif
   <form class="form-horizontal" action="/edit" method="POST">
   @csrf
   <input type="hidden" name="id_usterki" id="id_usterki" value="{{$usterki['id_usterki']}}">
   <div class="form-inline">
   <div class="form-group">
   {!! "&nbsp;" !!} {!! "&nbsp;" !!} {!! "&nbsp;" !!} 

   <label class="control-label col-sm-2" for="data">Miejsce usterki:
   <div class="col-sm-10">
   <input type="text" name="place" class="form-control" id="place" value="{{$usterki['place']}}"> </label>
  </div>
</div>

    <div class="center">
   <label class="control-label col-sm-2" for="data">Data:
   <div class="col-sm-10">
   <input type="date" name="date" class="form-control" id="date" value="{{$usterki['date']}}"> </label>
  </div>
</div>


<div class="form-group">
<label class="control-label col-sm-2" for="tresc">Opis Zdarzenia:
<div class="col-sm-10"> 
   <input type="text" action="#" name="tresc" class="form-control" placeholder="Wprowadź opis wpłaty" id="tresc" value="{{$usterki['tresc']}}"> </label><!-- drugi wiersz 2 kolumna -->
   </div>
    </div>

 
    <div class="form-group">
<label class="control-label col-sm-2" for="tresc">Autor Wpisu:   
<div class="col-sm-10"> 
   <input type="text" class="form-control" name="autor" id="autor" value="{{$usterki['autor']}}"></label> 
   </div>
    </div>





   <button type="submit" class="btn btn-default">Edytuj zgłoszenie</button>
 
              

           
           

            
               
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