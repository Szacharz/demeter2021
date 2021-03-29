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
    <title>Dementor</title>
    <head><link rel = "icon" href = "https://www.vhv.rs/dpng/d/539-5398503_transparent-dementor-png-silhouette-harry-potter-dementor-png.png"  type = "image/x-icon">
</head>
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
              <a href="payin" class="small-box-footer">Kliknij by przejść dalej <i class="fa fa-arrow-circle-right"></i></a>
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
              <a href="payout" class="small-box-footer">Kliknij by przejść dalej <i class="fa fa-arrow-circle-right"></i></a>
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
              <a href="report" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
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
              <a href="reporthis" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
               
          <div id="container">
    <h2> Edycja wypłaty (rozchodu) </h2>
    @if(count($errors)>0)
    <ul>
      @foreach($errors->all() as $error)
    <li class="alert alert-danger">{{$error}}</li>
    @endforeach
    </ul>
    @endif
   <form class="form-horizontal" action="/edit2" method="POST">
   @csrf

   <input type="hidden" name="id" value="{{$wyplata['id']}}">
   <div class="form-inline">
   <div class="form-group">
  
   {!! "&nbsp;" !!} {!! "&nbsp;" !!} {!! "&nbsp;" !!} 
  <label class="control-label col-sm-2" for="data">Numer wpłaty:
   <div class="col-sm-10">
   <input type="number" name="numer_wyplaty" class="form-control" id="numer_wyplaty" value="{{$wyplata['numer_wyplaty']}}"> </label>
  </div>
</div>

<div class="center">
   <label class="control-label col-sm-2" for="data">Data:
   <div class="col-sm-10">
   <input type="date" name="data" class="form-control" id="data" value="{{$wyplata['data']}}"> </label>
  </div>
</div>


<div class="form-group">
<label class="control-label col-sm-2" for="tresc">Opis:
<div class="col-sm-10"> 
   <input type="text" action="#" name="tresc" class="form-control" placeholder="Wprowadź opis wypłaty" id="tresc" value="{{$wyplata['tresc']}}"> </label><!-- drugi wiersz 2 kolumna -->
   </div>
    </div>

 
    <div class="form-group">
<label class="control-label col-sm-2" for="tresc">Kwota wypłaty:   
<div class="col-sm-10"> 
   <input type="number" class="form-control" placeholder="1.00" step="0.01" min="0" max="100000000" name="kwota_rozchodu" value="{{$wyplata['kwota_rozchodu']}}"></label> 
   </div>
    </div>


   <button type="submit" class="btn btn-default">Edytuj wypłatę</button>
 
              

           
           

            
               
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