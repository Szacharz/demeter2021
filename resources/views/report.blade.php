@extends('layouts.admin')
<script src="js/jquery.min.js"></script>

<!-- Bootstrap library -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="bootstrap/js/bootstrap.min.js"></script>



                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
                <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
                <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

                <!-- our script will be here -->
            </div>
        </div>
    </div>
@endsection 
</head>
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
                <h3>Lista zgłoszeń <sup style="font-size: 20px"></sup></h3>
                <p> Podgląd listy zgłoszeń<p>
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
                <h3>Placeholder</h3>

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
               
         
    <script type="text/javascript">
     $(document).ready(function() {
    $.noConflict();
    
    $('#usterki').DataTable({
        ajax: '',
        serverSide: true,
        processing: true,
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'phone', name: 'phone'},
            {data: 'dob', name: 'dob'}
        ]
    });
})
</script>

<br /> <br />  

<div class="container">
<form class="form-inline" type="post" action="{{url ('/search')}}">
  <div class="form-group mb-2">
    <h1> Wszystkie zgłoszenia </h1>
    <input type="text" value="Search" />
  </div>
  <div class="form-group mx-sm-3 mb-2">
  
  </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


<table class="table table-striped table-bordered text-center table-hover table-responsive-lg" id="usterki"> 
      <tr>
      <th>@sortablelink('id_usterki') # </th>
      <th>@sortablelink('tresc')Treść</th>
      <th>@sortablelink('data')Data</th>
      <th>@sortablelink('deadline')Deadline</th>
      <th>@sortablelink('data')Autor</th>
      <th>@sortablelink('place')Miejsce</th>
      <th>@sortablelink('status')Status</th>
      <th >Edytuj</th>
      <th >Usuń</th>
      </tr>
      @foreach($usterki as $row)
   </div>  
      <tr>
        <td>{{$row['id_usterki']}}.</td>
        <td>{{$row['tresc']}}</td>
        <td>{{$row['data']}}</td>
        <td>{{$row['deadline']}}</td>
        <td>{{$row['autor']}}</td>
        <td>{{$row['place']}}</td>
        <td class= "text-danger" >{{$row['status']}}</td>
       
        <td>
          <a href={{"edit/".$row['id_usterki']}} class="btn btn-default">Edytuj</a>
          </td>
        <td>
        <a href={{"delete/".$row['id_usterki']}} class="btn btn-default" >Usuń</a>
        </td>
      </tr>
      @endforeach
    </table>
    {!! $usterki->appends(\Request::except('page'))->render() !!}
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
