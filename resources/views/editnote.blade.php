@extends('layouts.admin')

@section('content')

    <!-- Main content -->
    <section class="content">
      
    <div class="container">
    <div class="row h-100 justify-content-center align-items-center">
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
            <form class="form-example" action="/editnote" method="POST">
            @csrf
            <input type="hidden" name="id_notatki" id="id_notatki" value="{{$notatki['id_notatki']}}">
         <br>
               <div class="card-header"> <h1>Edycja Notatki o id: {{$notatki['id_notatki']}}</h1>
                <p class="description">Edytuj istniejącą notatkę.</p>
               <!-- Input fields -->
                  <div class="card-body">
                   <div class="form-group">
                    <label for="tresc_nt">Treść notatki</label>
                    <input type="text" class="form-control" id="tresc_nt" placeholder="Podaj treść wpisu..." name="tresc_nt" value="{{$notatki['tresc_nt']}}">
                </div>
               
                <p align="right">
                <button type="submit" class="btn btn-primary">Edytuj wpis</button>
               </p> 
               <!-- End input fields -->
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