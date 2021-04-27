@extends('layouts.admin')


<!-- Bootstrap library -->
<head>
<link rel = "icon" href = "https://www.vhv.rs/dpng/d/539-5398503_transparent-dementor-png-silhouette-harry-potter-dementor-png.png"  type = "image/x-icon">
</head>

@section('content')
<!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      
    <br /> <br />  
               
         
          <script type="text/javascript">
   $('data').datepicker({
       todayBtn: "linked",
       language: "it",
       autoclose: true,
       todayHighlight: true,
       Format: 'dd/mm/yyyy' 
   });
</script>


@if (session('success'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif
    

   <div class="container">
   
           
    <div class="row justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <!-- Form -->
            @if(count($errors)>0)
           <ul>
      @foreach($errors->all() as $error)
    <li class="alert alert-danger">{{$error}}</li>
    @endforeach
    </ul>
    @endif
    <div class="form-group mb-4">
           <div class="card-header"> <h2> Panel użytkownika  </h2>
           </div>
            <div class="card">
            
            <form class="form-example" action="/changepassd" method="POST">
            @csrf
            <div class="card-header">
            <h3>Zmiana hasła</h3>
            </div>
            <div class="card-body">
            <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Aktualne hasło</label>
  
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Nowe hasło</label>
  
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Potwierdź nowe hasło</label>
    
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div>
   
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Zmień hasło
                                </button>
                            </div>
                        </div>
                    </form>
              <!-- /.card-body -->
              </div>
              </div>
              <form class="form-example" action="/changename" method="POST">
              <div class="card">
              <div class="card-header">
              <h3> Zmiana nazwy użytkownika </h3>
              </div>
              <div class="card-body">
            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Aktualna nazwa</label>
  
                            <div class="col-md-6">
                                <input id="name"  class="form-control" name="current_name" id="current_name" value="{{Auth::user()->name }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="new_name" class="col-md-4 col-form-label text-md-right">Nowa nazwa</label>  
                         <div class="col-md-6">
                        <input id="new_name"  class="form-control" name="new_name">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Zmień nazwę
                                </button>
                            </div>
                        </div>
 </form>
                </div>


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
