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

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
        <div class="card">
  <form class="form-example" action="/editgroup" method="POST">  
<form class="form-inline">
     
     @csrf
          <div class="form-group mb-2">
           <div class="card-header cell-breakWord"><h1>Edytowana grupa: {{$grupa['group_desc']}}</h1> <h5><b></b></h5> </div>
           </div>
           <input type="hidden" name="id" id="id" value="{{$grupa['id']}}">
            <div class="card-body">
            <div class="form-group">
                    <label for="name" class="control-label col-sm-3 text-nowrap">Grupa: </label>
                    <input type="text" class="form-control" id="group_desc" name="group_desc" value="{{$grupa['group_desc']}}" autofocus>  
                    <br>

                    <div class="form-group">
                        <label for="member1" class="control-label col-sm-3 text-nowrap">Członek 1:</label>
                        <select name="member1" id="member1">
                        <option value="" selected disabled>Wybierz użytkownika</option>
                        @foreach($users as $item)
                       <option value="{{$item->id}}"> {{$item->name}}</option>
                       @endforeach
                        </select>
                    </div>
                        <div class="form-group">
                        <label for="member2" class="control-label col-sm-3 text-nowrap">Członek 2:</label>
                        <select name="member2" id="member1">
                        <option value="" selected disabled>Wybierz użytkownika</option>
                        @foreach($users as $item)
                       <option value="{{$item->id}}"> {{$item->name}}</option>
                       @endforeach
                        </select>
                        </div>
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
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @endsection
