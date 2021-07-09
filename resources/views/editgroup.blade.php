@extends('layouts.admin')


<!-- Bootstrap library -->

@section('content')
<!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      
    <br /> <br />  
               
         
    <script type=text/javascript>
  $('#member1').change(function(){
  var member1ID = $(this).val();  
  if(member1ID){
    $.ajax({
      type:"GET",
      url:"{{url('getUsers')}}?departments_id="+member1ID,
      success:function(res){        
      if(res){
        $("#member1").empty();
        $("#member1").append('<option>Wybierz usea</option>');
        $.each(res,function(key,value){
          $("#member1").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#member1").empty();
      }
      }
    });
  }else{
    $("#member1").empty();
    $("#city").empty();
  }   
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


@if(Auth::user()->role== "Kierownik" or Auth::user()->role== "Admin")
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
        <div class="card">
  <form class="form-example" action="/editgroup" method="POST">  
<form class="form-inline">
     
     @csrf
          <div class="form-group mb-2">
          <div class="p-3 mb-2 bg-dark text-white">  <div class="card-header">   
           <div class="card-header cell-breakWord"><h1>Edytowana grupa: {{$grupa['group_desc']}}</h1> <h5><b></b></h5> </div>
           </div>
           </div>
           <input type="hidden" name="id" id="id" value="{{$grupa['id']}}">
            <div class="card-body">
            <div class="form-group">
                    <label for="name" class="control-label col-sm-3 text-nowrap">Opis grupy: </label>
                    <input type="text" class="form-control" id="group_desc" name="group_desc" value="{{$grupa['group_desc']}}" autofocus>  
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
@else
<div class="container-xl">
            <div class="col-lg my-auto">

  <div class="card text-white bg-danger">
  <div class="card-header"><h1><i class="fa fa-shield"></i> Administracja </h1></div>
  <div class="card-body">
    <h5 class="card-title" align="center"> Brak Dostępu. Niewystarczające uprawnienia. </h5>
    <p class="card-text">Do tej części strony dostęp ma tylko Administrator. </p>
  </div>
</div>
</div>
</div>
@endif

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
