@extends('layouts.admin')


<!-- Bootstrap library -->


@section('content')
<!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <br /> <br />  

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
    
<style>
  .reveal-if-active {
  opacity: 0;
  max-height: 0;
  overflow: hidden;
  transform: scale(0.8);
  transition: 0.5s;
  opacity: 1;
  max-height: 100px;
  overflow: visible;
  padding: 10px 20px;
  transform: scale(1);
  }

</style>

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
        <div class="card">
            <!-- Form -->
            @if(count($errors)>0)
           <ul>
      @foreach($errors->all() as $error)
    <li class="alert alert-danger">{{$error}}</li>
    @endforeach
    </ul>
    @endif
            <form class="form-example" action="/departmentsubmit" method="POST">
            @csrf
              <div class="card-header">
                <h1><i class="fa fa-plus-circle"></i> Tworzenie nowego działu</h1>
                <p class="description">Dodaj dział, wypełniając forumlarz.</p>
                <!-- Input fields -->
                </div>
                <div class="card-body">
                <div class="form-group">
                    <label for="tresc">Nazwa działu:</label>
                    <textarea  height="100%" class="form-control" id="departments" placeholder="Wprowadź nazwę działu..." name="departments" autofocus></textarea>
                </div>
                <!-- <div class="form-group">
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
                        <select name="member2" id="member2">
                        <option value="" selected disabled>Wybierz użytkownika</option>
                        @foreach($users as $item)
                       <option value="{{$item->id}}"> {{$item->name}}</option>
                       @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                        <label for="member3" class="control-label col-sm-3 text-nowrap">Członek 3:</label>
                        <select name="member3" id="member3">
                        <option value="" selected disabled>Wybierz użytkownika</option>
                        @foreach($users as $item)
                       <option value="{{$item->id}}"> {{$item->name}}</option>
                       @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                        <label for="member4" class="control-label col-sm-3 text-nowrap">Członek 4:</label>
                        <select name="member4" id="member4">
                        <option value="" selected disabled>Wybierz użytkownika</option>
                        @foreach($users as $item)
                       <option value="{{$item->id}}"> {{$item->name}}</option>
                       @endforeach
                        </select>
                        </div>
                </div> -->
        
                <p align="right">
                <button type="submit" class="btn btn-default">Dodaj dział</button>
                </p>
                <!-- End input fields -->
                </div>
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
