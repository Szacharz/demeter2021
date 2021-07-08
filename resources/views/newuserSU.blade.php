@extends('layouts.admin')


<!-- Bootstrap library -->


@section('content')
<!-- Content Header (Page header) -->
<div style="text-align: right; margin-right: 10px">
        <h6><u>  @foreach($departments as $row) Zalogowany jako: {{Auth::user()->name }}, dział {{$row['departments']}} @endforeach  </u></h6>
    </div>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
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
<style>
a
{text-decoration: none;
 background-color: none;
 color:black; }

 .cell-breakWord {
  word-break: break-word;
 }

</style>
@if(Auth::user()->role== "Admin")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="p-3 mb-2 bg-dark text-white">
        <H1> Załóż konto w Dementorze </h1>
        </div>
                <div class="card-body">
                    <form method="POST" action="/register">
                    @csrf
                  
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nazwa') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adres e-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Hasło') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Powtórz Hasło') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="departments" class="col-md-4 col-form-label text-md-right">{{ __('Wybierz dział') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="departments" id="departments"> 
                                <option value="" selected disabled>Wybierz dział</option>
                                    @foreach($departments2 as $item)
                                <option value="{{$item->id}}">{{$item->departments}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Zarejestruj') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else
            <div class="container-xl">
            <div class="col-lg my-auto">

  <div class="card text-white bg-danger">
  <div class="card-header"><h1><i class="fa fa-shield"></i> Nie wystarczające uprawnienia. </h1></div>
  <div class="card-body">
    <h5 class="card-title" align="center"> Brak Dostępu. </h5>
    <p class="card-text">  Do tej części strony dostęp ma tylko użytkownik należący do odpowiedniego działu. </p>
  </div>
</div>
</div>
</div>
<br> </br>
@endif

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
