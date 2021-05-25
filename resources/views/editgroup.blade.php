@extends('layouts.admin')


<!-- Bootstrap library -->

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
  <form class="form-example" action="/editgroup" method="POST">  
<form class="form-inline">
     
     @csrf
          <div class="form-group mb-2">
           <div class="card-header cell-breakWord"><h1>Edytowana grupa: {{$grupa['group_desc']}}</h1> <h5><b></b></h5> </div>
           </div>
           </div>
           <input type="hidden" name="id" id="id" value="{{$grupa['id']}}">
         
           <div class="row justify-content-center align-items-center">
           <div class="col-10 col-md-8 col-lg-6">
            <div class="card-body">
            <div class="form-group">
                    <label for="name" class="control-label col-sm-3 text-nowrap">Grupa: </label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="group_desc" name="group_desc" value="{{$grupa['group_desc']}}" autofocus>
                </div>
                     
                    <button type="submit" class="btn btn-default">Zapisz zmiany</button> 
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
