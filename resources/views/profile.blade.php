@extends('layouts.admin')


<!-- Bootstrap library -->


@section('content')
<!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div style="text-align: right;">
  <h6><u>  @foreach($departments as $row) Zalogowany jako: {{Auth::user()->name }}, dział {{$row['departments']}} @endforeach  </u></h6>
      </div>
    <br /> 
               
         
          <script type="text/javascript">

   $(document).ready(function () {
 
 window.setTimeout(function() {
     $(".alert").fadeTo(500, 0).slideUp(500, function(){
         $(this).remove(); 
     });
 }, 1500);
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
    <div class="card">
 
    <div class="p-3 mb-2 bg-dark text-white">
                <div class="card-header">
                <div class="form-group mb-2" align="center">
                  <h3>Statystyki </h3>
                </div>
            </div>
            <div class="card-body">
                <div align="center">
                <h5>Dobra robota! Wygląda na to, że wpisy są wykonywane przez Ciebie sumiennie. KEEP THE GOOD WORK!</h5>
        <div class="row">
           <div class="col-md-8 offset-md-1" align="center">
             <div class="panel panel-default">
                <div class="panel-body">
                    <canvas id="canvas" height="200" width="400"></canvas>
                </div>
            </div>
</div>
      </div>
</div>
</div>
    </div>
    
        </div>
        <!-- /.row (main row) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var month = <?php echo $month; ?>;
    var stats = <?php echo $stats; ?>;
    var stats2 = <?php echo $stats2; ?>;
    var barChartData = {
        labels: month, 
        datasets: [{
            label: 'Twoje Wpisy',
            backgroundColor: "lightyellow",
            data: stats
        },
        {
            label: 'Ukończone Wpisy',
            backgroundColor: "lightblue",
            data: stats2
            }
    ]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Liczba Twoich wpisów w danym miesiącu'
                }
            }
        });

    };
</script>

   

   <div class="container">
       <!-- Panel preferencji -->
   <!-- <div class="card">
            <div class="p-3 mb-2 bg-dark text-white">
                <div class="card-header" style="text-align:center">
                  <h3>Preferencje użytkownika </h3>
                </div>
            </div>
            <div class="card-body">
                < element w budowie >
            <div class="form-group row">
                        </div>
                  <p align="right"> </p>
            </div>
</div>  -->
   <div class="row">
            <div class="col-lg-6 mb-4">
                
            <!-- Form -->
            @if(count($errors)>0)
           <ul>
      @foreach($errors->all() as $error)
    <li class="alert alert-danger">{{$error}}</li>
    @endforeach
    </ul>
    @endif
    <div class="form-group mb-4">
            <div class="card">
            <form class="form-example" action="/changepassd" method="POST">
            @csrf
            <div class="p-3 mb-2 bg-dark text-white">
                <div class="card-header">
            <h3>Zmiana hasła</h3>
                 </div>
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
                                <input id="new_password"  type="password" class="form-control" name="new_password" autocomplete="current-password">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Potwierdź nowe hasło</label>
    
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div>
   
                        <p align="right"> 
                                <button type="submit" class="btn btn-primary">
                                    Zmień hasło
                                </button>
                        </p>
                    </form>
              <!-- /.card-body -->
              
              </div>
              </div>
               </div>
</div>
<div class="col-lg-6 mb-4">
            <div class="card">
            <form class="form-example" action="/changenick" method="POST">
            @csrf
            <div class="p-3 mb-2 bg-dark text-white">
                <div class="card-header">
                  <h3>Zmiana nazwy użytkownika </h3>
                </div>
            </div>
            <div class="card-body">
            <div class="form-group row">
            <input type="hidden" name="id" id="id" value="{{Auth::user()->id}}">
                            <label for="nickname" class="col-md-4 col-form-label text-md-right">Aktualna nazwa</label>
  
                            <div class="col-md-6">
                                <input id="nickname" class="form-control" name="nickname" value="  {{Auth::user()->name }}" disabled>
                            </div>
                        </div>
                        <br>  <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nowa nazwa</label>
  
                            <div class="col-md-6">
                                <input id="name"  class="form-control" name="name">
                            </div>
                        </div>
                  <p align="right"> 
                                <button type="submit" class="btn btn-primary">
                                    Zmień nazwę
                                </button>
                    </p>    
                    </form>

                    </div>
              </div>
        </div>
</div>

 <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @endsection
