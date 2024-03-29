@extends('layouts.admin')

@section('content')

    <!-- Main content -->
    <section class="content">
      <br><br>
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
            <input type="hidden" name="id_notatki" id="id_notatki" value="{{$Notatki['id_notatki']}}">
            <input type="hidden" name="id_usterki" id="id_usterki" value="{{$usterki['id_usterki']}}">
              <div class="p-3 mb-2 bg-dark text-white">  <div class="card-header">   
               <h1>Edytuj notatkę</h1>
                <p class="description">Edytuj istniejącą notatkę.</p>
               </div><!-- Input fields -->
               </div>
                  <div class="card-body">
                   <div class="form-group">
                    <label for="tresc_nt">Treść notatki</label>
                    <input type="text" class="form-control" name="tresc_nt" id="tresc_nt" value="{{$Notatki['tresc_nt']}}">
                </div>
               
                <p align="right">
                <button type="submit" class="btn btn-primary">Edytuj notatkę</button>
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