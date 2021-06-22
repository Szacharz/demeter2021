@extends('layouts.admin')


<!-- Bootstrap library -->

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
        <div class="card">
  <form class="form-example" action="/edit3" method="POST">  
<form class="form-inline">
     
     @csrf
          <div class="form-group mb-2">
           <div class="card-header cell-breakWord"><h1>Edytowany użytkownik: {{$users['name']}}</h1> <h5><b></b></h5> </div>
           <input type="hidden" name="id" id="id" value="{{$users['id']}}">
            <div class="card-body">
            <div class="form-group">
                    <label for="name" class="control-label col-sm-3 text-nowrap">Nazwa użytkownika: </label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$users['name']}}" autofocus>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label col-sm-3 text-nowrap">Adres email: </label>
                    <input type="text" class="form-control" id="email" name="email" value="{{$users['email']}}">
                </div>

                <div class="form-group">
                    <label for="role" class="control-label col-sm-3 text-nowrap">Rola: </label>
                    <select class="form-control" name="role" id="role">
                    <option>Standard</option>
                     <option>Admin</option>
                     </select>
                     <br>
                     <p align="right">
                    <button type="submit" class="btn btn-default">Zapisz zmiany</button> 
                    </p>
                </div>
               
                </div>
                 </div>
                </form>
                </div>
                </div>
                </div>
            </form>
            </form>
            </form>
            <!-- Form end -->
        </div>
    </div>
</div>
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
