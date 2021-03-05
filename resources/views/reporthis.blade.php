@extends('layouts.admin')
<head> <link rel = "icon" href = "https://www.flaticon.com/premium-icon/icons/svg/2883/2883199.svg"  type = "image/x-icon">


</head>
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
                <h3>Dodawanie wpisu </h3>
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
                <h3>Lista wpisów <sup style="font-size: 20px"></sup></h3>
                <p> Podgląd listy wpisów <p>
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
              <!--
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
-->

<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
    
<div class="container mt-5">
    <h2 class="mb-4">TESTOWA DATATABELA</h2>
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>id_usterki</th>
                <th>tresc</th>
                <th>data</th>
                <th>deadline</th>
                <th>autor</th>
                <th>place</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('reporthis.list') }}",
        columns: [
            {data: 'id_usterki', name: 'id_usterki'},
            {data: 'tresc', name: 'tresc'},
            {data: 'data', name: 'data'},
            {data: 'deadline', name: 'deadline'},
            {data: 'autor', name: 'autor'},
            {data: 'place', name: 'place'},
            {data: 'status', name: 'status'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, s
                searchable: true
            },
        ]
    });
    
  });
</script>









             <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    
    @endsection


