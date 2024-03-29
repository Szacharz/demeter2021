<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dementor</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<!-- DataTables-->
  <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Delete selected notification script-->
<script src="{{asset('/js/main.js')}}"></script>

<!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<link rel = "icon" href ="{{URL::asset('/img/D.png')}}"  type = "image/x-icon">

</head>

<style>
.btn-pink{
  background-color:pink;
}
.btn-orange{
  background-color:orange;
}
.btn-green{
  background-color:#3BB273;
}
.btn-red{
  background-color:#E15554;
}
.btn-purple{
  background-color:#7768AE;
}
.btn-blue{
  background-color: #4d9de0;
}
.btn-admin{
  background-color:slateblue
}


</style>

<?php 
use App\Notifications\NewUsterkiNotification;
use App\Models\usterkimodel;
use App\Models\Notatki;
use App\Notifications\NewEntry;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\User;
{
  $userid=Auth::user()->id;

  $user=  User::find(auth()->user()->id);

  $notifications = $user->unreadNotifications;
  $ile=count($notifications);

}
?>


<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper" class="toggled">

  <!-- Navbar -->
  <nav class="main-header  navbar-expand navbar navbar-dark bg-dark elevation-4">
    <!-- Left navbar links -->
	
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <div class="col-m-3" style="margin-right: 5px">
        <li class="nav-item d-none d-sm-inline-block">
  <a class="btn btn-primary " href='{{url('home')}}' role="button" aria-expanded="false"><h7> <i class="fa fa-home"></i> Strona główna</h7> </a>
        </li>
       
        <li class="nav-item d-none d-sm-inline-block">
          <div class="col-m-3 dropdown" >
          <a class="btn btn-primary dropdown-toggle" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list"></i> 
              Wpisy
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href='{{url('report')}}' role="button"><h7><i class="fa fa-list"></i> Lista wpisów</h7></a>
                <a class="dropdown-item" href='{{url('payin')}}' role="button"><h7><i class="fa fa-plus"></i> Utwórz nowy wpis</h7></a>
                <a class="dropdown-item" href='{{url('payout')}}' role="button"><h7><i class="fa fa-lock"></i> Lista prywatna</h7> </a>
              <a class="dropdown-item" href='{{url('group')}}' role="button"><h7><i class="fa fa-users"></i> Grupowe </h7></a> 
              <a class="dropdown-item" href='{{url('expiration')}}' role="button"><h7><i class="fa fa-gavel"></i> Przedawnione wpisy</h7></a>
              <a class="dropdown-item" href='{{url('reporthis')}}' role="button"><h7><i class="fa fa-archive"></i> Archiwum </h7></a>
              </div>
          </div>
          </li>

@if(Auth::user()->department_id== 1)
          <li class="nav-item d-none d-sm-inline-block">
            <div class="col-m-3 dropdown" >
              <a class="btn btn-primary dropdown-toggle" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list"></i> 
                Pożyczony sprzęt
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item"   href='{{url('borrowedequipment')}}' role="button" aria-expanded="false"><h7> <i class="fa fa-desktop"></i> Lista sprzętu</h7> </a>
            <a class="dropdown-item" href='{{url('newdevice')}}' role="button"><h7><i class="fa fa-plus"></i> Dodaj  sprzęt</h7></a>
            <a class="dropdown-item" href='{{url('archivedevice')}}' role="button"><h7><i class="fa fa-archive"></i> Archiwum </h7></a>
              </div></div></li>
@endif

  </div>



@if(Auth::user()->role== "Kierownik" or Auth::user()->role== "Admin")
<li class="nav-item d-none d-sm-inline-block">
<div class="col-m-3 dropdown" style="margin-right: 5px">
<a class="btn btn-primary dropdown-toggle" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shield"></i> 
    Panel kierownika
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href='{{url('manage')}}' role="button"><h7><i class="fa fa-shield"></i> Zarządzanie </h7></a>
    <a class="dropdown-item" href='{{url('dictionary')}}' role="button"><h7><i class="fa fa-shield"></i> Słownik - grupy </h7></a>
    @if(Auth::user()->department_id== "1")
    <a class="dropdown-item" href='{{url('departmentstats')}}' role="button"><h7><i class="fa fa-shield"></i> Statystyki </h7></a>
    @endif
    </div>
</div>
</li>
    @endif

   @if(Auth::user()->role== "Admin")   
   <li class="nav-item d-none d-sm-inline-block">
    <div class="col-m-3 dropdown">
<a class="btn btn-primary dropdown-toggle" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shield"></i> 
    Panel Admina
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href='{{url('superadmin')}}' role="button"><h7><i class="fa fa-shield"></i> Użytkownicy </h7></a>
    <a class="dropdown-item" href='{{url('listdepartments')}}' role="button"><h7><i class="fa fa-shield"></i> Słownik - Działy </h7></a>
    </div>
</div>
</li>
    @endif

      </li>
    </ul>




     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
<!-- Messages Dropdown Menu -->
<li class="nav-item dropdown">
  <a class="nav-link" data-toggle="dropdown" href="#">
    <i class="fa fa-bell" style="color:white"></i>
    <span class="badge badge-warning navbar-badge"><strong>{{$ile}}</strong></span>
  </a>


  <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right" >
    <span class="dropdown-item dropdown-header">Powiadomienia - <strong>{{$ile}}</strong></span>
    <div class="dropdown-divider"></div>
    @forelse($notifications as $notification)
    @include('newusterkinotification')    <div class="dropdown-divider"></div>
    @empty
    <a class="dropdown-item powiadomienie"><span class="float-left text-sm" style="margin:0px 10px 0px 0px">  
     Nie masz nowych powiadomień.
    </span></a>
    @endforelse

      <a href='{{url('markAsRead')}}'><span class="dropdown-item dropdown-header">Wyczyść powiadomienia</span></a>
      <div class="dropdown-divider"></div>
  </div>

</li>
{{-- <li class="nav-item">
  <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
    <i class="fas fa-th-large"></i>
  </a>
</li> --}}

      <!-- Messages Dropdown Menu -->
  </ul>
            <!-- Message End -->     
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-collapse sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href='{{ url('home')}}' class="brand-link">
    {!! "&nbsp;" !!} {!! "&nbsp;" !!}  <i class="nav-icon fa fa-calculator"></i>
      <span class="brand-text font-weight-light">Panel Dementor</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel d-flex">
      
      <div class="info">
      <a href='{{url('profile')}}' class="d-block">
      <i class="fa fa-user-circle" aria-hidden="true"></i>

    {{Auth::user()->name }} 

      </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
          <?php
            $segment = Request::segment(2);
          ?>
              <li class="nav-item">
                <a href="{{ url('report') }}" class="nav-link">
                  <i class="fa fa-list"></i>
                  <p>
                    Lista wpisów
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('payin') }}" class="nav-link">
                  <i class="fa fa-plus"></i>
                  <p>
                    Utwórz wpis
                  </p>
                </a>
              </li>
         
              <li class="nav-item">
                <a href="{{ url('payout') }}" class="nav-link">
                  <i class="fa fa-lock"></i>
                  <p>
                    Lista prywatna
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('group') }}" class="nav-link"> 
                  <i class="fa fa-users"></i>
                  <p>
                    Grupowe
                  </p>
                </a>
              </li>

          
          <li class="nav-item">
            <a href="{{ route('expiration') }}" class="nav-link">
              <i class=" fa fa-gavel"></i>
              <p>
                Przedawnione wpisy
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('reporthis') }}" class="nav-link"> 
              <i class="fa fa-archive"></i>
              <p>
                Archiwum
              </p>
            </a>
          </li>

          @if(Auth::user()->role== "Kierownik" or Auth::user()->role== "Admin")
          <li class="nav-item">
            <a href='{{url('manage')}}' class="nav-link">
              <i class=" fa fa-shield"></i>
              <p>
              Panel kierownika
              </p>
            </a>
          </li>
          @endif
          <li class="nav-header">Akcje</li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="nav-icon fa fa-power-off"></i>
                                                     {!! "&nbsp;" !!} {!! "&nbsp;" !!}  {{ __(' Wyloguj') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>


           
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
</div>
  <!-- /.content-wrapper -->
  <footer class="footer">
    
    <div class="float-right d-none d-sm-inline-block">
    Dementor<span>&#169;</span>Miłosz Walkowski
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Additional-->

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
</body>

<script>
       function myFunction()
       {
        var x = document.getElementById("tresc").autofocus;
       }
       </script>
</html>

