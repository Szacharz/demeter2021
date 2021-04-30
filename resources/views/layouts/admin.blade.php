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

<!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
  
</head>


<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper" class="toggled">

  <!-- Navbar -->
  <nav class="main-header navbar-expand navbar navbar-dark bg-dark elevation-4">
    <!-- Left navbar links -->
	
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <div class="col-m-3">
  <a class="btn btn-info " href='http://dementor/home' role="button" aria-expanded="false"><h6> <i class="fa fa-home"></i> Strona główna</h6> </a>
  </div>

  <div class="col-m-3 dropdown">
<a class="btn btn-success dropdown-toggle" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h7><i class="fa fa-shield"></i> 
    Wpisy </h7>
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <a class="dropdown-item" href='http://dementor/payin' role="button"><h6> <i class="fa fa-plus-circle"></i> Nowy Wpis </h6></a>
  <a class="dropdown-item" href='http://dementor/report' role="button"><h6><i class="fa fa-list"></i> Lista zgłoszeń</h6></a>
  </div>
</div>
  <div class="col-m-3 dropdown">
  <a class="btn btn-danger " href='http://dementor/expiration'role="button"><h6><i class="fa fa-gavel"></i> Przedawnione wpisy</h6></a>
  <a class="btn btn-warning " href='http://dementor/payout'role="button"><h6><i class="fa fa-lock"></i> Lista prywatna</h6> </a>
  <a class="btn btn-info " href='http://dementor/reporthis'role="button"><h6><i class="fa fa-archive"></i> Archiwum </h6></a>
  </div>
@if(Auth::user()->role== "Admin")
<div class="col-m-3 dropdown">
<a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shield"></i> 
    Panel Administracyjny
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href='http://dementor/manage'role="button"><h6><i class="fa fa-shield"></i> Zarządzanie </h6></a>
    <a class="dropdown-item" href='http://dementor/manage'role="button"><h6><i class="fa fa-shield"></i> Słownik </h6></a>
    </div>

  @endif

</div>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
      
        <div class="input-group-append">
       
        </div>
      </div>
    </form>

    <!-- Right navbar links --> 
	
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     	
            <!-- Message End -->

            
         
      <!-- Notifications Dropdown Menu -->
      <span class="navbar-text">
	</span>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-collapse sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="http://dementor/home" class="brand-link">
    {!! "&nbsp;" !!} {!! "&nbsp;" !!}  <i class="nav-icon fa fa-calculator"></i>
      <span class="brand-text font-weight-light">Panel Dementor</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel d-flex">
      
      <div class="info">
      <a href='http://dementor/profile' class="d-block">
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
          <li class="nav-item has-treeview">
            <a href="{{ route('home') }}" class="nav-link 
              @if(!$segment)
              active
              @endif
              ">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Strona główna
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('payin') }}" class="nav-link ">
            
              <i class="fa fa-cash-register nav-icon"></i>
              <p>
                Wprowadź nowy wpis
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{route('report') }}" class="nav-link ">
            
              <i class="nav-icon fa fa-cash-register"></i>
              <p>
                Lista wpisów
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{route('payout') }}" class="nav-link ">
            
              <i class="nav-icon fa fa-cash-register"></i>
              <p>
                Lista Prywatna
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{route('reporthis') }}" class="nav-link ">
            
              <i class="nav-icon fa fa-cash-register"></i>
              <p>
                  Archiwum
              </p>
            </a>
            
          </li>
          </li>
          
          </ul> 
          <li class="nav-item">
            <a href="{{ route('expiration') }}" class="nav-link">
              <i class="nav-icon fa fa-gavel"></i>
              <p>
                Przedawnione wpisy
              </p>
            </a>
          </li>
          @if(Auth::user()->role== "Admin")
          <li class="nav-item">
            <a href='http://dementor/manage' class="nav-link">
              <i class="nav-icon fa fa-shield"></i>
              <p>
              Panel Administracyjny
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

