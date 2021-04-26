@extends('layouts.admin')


<!-- Bootstrap library -->
<head>
<link rel = "icon" href = "https://www.vhv.rs/dpng/d/539-5398503_transparent-dementor-png-silhouette-harry-potter-dementor-png.png"  type = "image/x-icon">
</head>

@section('content')
<!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      
    <br /> <br />  
               
         
          <script type="text/javascript">
   $('data').datepicker({
       todayBtn: "linked",
       language: "it",
       autoclose: true,
       todayHighlight: true,
       Format: 'dd/mm/yyyy' 
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


<div class="container-md">
    <div class="row justify-content-center align-items-center">

<form class="form-inline">
          <div class="form-group mb-2">
           <div class="card-header cell-breakWord"><h1>Edytowany użytkownik: {{$users['name']}}</h1> <h5><b></b></h5> </div>
           </div>
           </div>
           <div class="col-10 col-md-8 col-lg-6">
            <div class="card-body">
            <div class="form-group">
                    <label for="name" class="control-label col-sm-3 text-nowrap">Nickcname: </label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="">
                </div>
               
                <div class="form-group">
                    <label for="role" class="control-label col-sm-3 text-nowrap">Rola: </label>
                    <div class="col-sm-9">
                    <input type="role" class="form-control" id="role" name="role" value="">
                </div>
                </div>
                </form>
                </div>
                </div>
                </div>
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
