@extends('layouts.admin') 

   

@section('content')
<div style="text-align: right; margin-right: 10px; margin-top: 3px">
    <u style="margin-left: 15px">  <a href="/profile">  @foreach($departments as $row) Zalogowany jako: {{Auth::user()->name }}, dział {{$row['departments']}} @endforeach  </a> </u></h6>
  </div>
    <script>
$(document).ready(function () {
 
 window.setTimeout(function() {
     $(".alert").fadeTo(500, 0).slideUp(500, function(){
         $(this).remove(); 
     });
 }, 1500);
 });
</script>

<style>
    .cell-breakWord {
      word-break: break-word;
     }
     .container {overflow: auto;}
    </style>
    


    <!-- Main content -->
<section class="content">
    <div class="container"> 
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
@if(Auth::user()->department_id == 1)
       
            <!-- Form -->
            @if(count($errors)>0)
                <ul>
                @foreach($errors->all() as $error)
                <li class="alert alert-danger">{{$error}}</li>
                @endforeach
                </ul>
            @endif
            
            <form  enctype="multipart/form-data" action="/notesubmit" method="POST" accept-charset="utf-8">
                @csrf
                <input type="hidden" name="id" id="id" value="{{$device['id']}}">

                <div class="row justify-content-center align-items-center">
                    <div class="col-10 col-md-8 col-lg-6">
                <div class="card">
                <div class="form-group mb-2">
                    <div class="p-3 mb-2 bg-dark text-white">
                        <div class="card-header cell-breakWord"><h4><i class="fa fa-desktop"></i> Karta sprzętu</h4> </div>
                    </div>
                </div>            
                <div class="card-body">
                    <h5>Nazwa sprzętu: {{$device['name']}}</h5>
                <hr>
                    <div class="form-group">
                        <label for="tresc">Szczegółowe informacje:</label>  
                        <p>
                             1. Autor karty: {{$device['autor']}} 
                        </p>
                        <p>
                              2. Status: {{$device['status']}}  </p>          
                        <p>
                        <p>
                             3. Data utworzenia wpisu: {{$device['data']}}  </p>          
                        <p>
                        <p>
                                4. Pożyczono osobie: {{$device['towho']}}  </p>          
                        <p>
                        <p>
                          <b>  5. Inne: {{$device['info']}} </p>  </b>        
                        <p>
                            <hr>
                              <a  style="float: right" href={{url("edit/{$device['id_usterki']}") }} class="btn  btn-info">Edytuj kartę wpisu</a> </p>
                    </div>
                  <!-- /.card-body -->
            </form>
            <!-- Form end -->      
                            @else
                                    <br> <br>
                                                <div class="container-xl">
                                                <div class="col-lg my-auto">
                                    <div class="card text-white bg-danger">
                                    <div class="card-header"><h1><i class="fa fa-shield"></i> Edycja Notatki </h1></div>
                                    <div class="card-body">
                                        <h5 class="card-title" align="center"> Brak Dostępu. </h5>
                                        <p class="card-text">  Do tej części strony dostęp ma tylko użytkownik należący do odpowiedniego działu. </p>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    <br> </br>
                            @endif          
            <!-- /.card -->
        </div>
    </div>
</section>    
    <!-- /.content -->
@endsection