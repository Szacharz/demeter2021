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

       function myFunction()
       {
        var x = document.getElementById("tresc").autofocus;
       }
});
     }
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
    <div class="row justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <!-- Form -->
            @if(count($errors)>0)
           <ul>
      @foreach($errors->all() as $error)
    <li class="alert alert-danger">{{$error}}</li>
    @endforeach
    </ul>
    @endif
            <form class="form-example" action="/usterkisubmit" method="POST">
            @csrf
                <h1><i class="fa fa-plus-circle"></i> Forumlarz nowego wpisu</h1>
                <p class="description">Dodaj nowy Wpis, wypełniajac formularz.</p>
                <!-- Input fields -->
                <div class="form-group">
                    <label for="tresc">*Opis wpisu:</label>
                    <textarea  height="100%" class="form-control" id="tresc" placeholder="Podaj treść wpisu..." name="tresc" autofocus></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="data" name="data"  value="<?php echo date('Y-m-d'); ?>" />
                </div>
                <div class="form-group">
                    <label for="deadline">Deadline</label>
                    <select class="form-control" name="deadline" id="deadline">


                    <option value="<?php  echo date('Y-m-d'); ?> ">
            
                    Dziś- 
                      <?php 
                   
                      echo date('Y-m-d'); ?> 
                    

                    </option>

                    <option value=" <?php $datetime = new DateTime('tomorrow'); echo $datetime->format('Y-m-d'); ?> ">
                    Jutro-
                    <?php 
                    $datetime = new DateTime('tomorrow');
                    echo $datetime->format('Y-m-d');
                    ?> 
                    
                    </option>

                    <option value=" <?php date_default_timezone_set('Europe/Warsaw'); $monday = strtotime('monday this week'); $sunday = strtotime('sunday this week');echo $this_week_ed = date("Y-m-d",$sunday); ?>">
                      Ten Tydzień (Do: 
                      <?php
                      date_default_timezone_set('Europe/Warsaw'); 
                      $monday = strtotime('monday this week');
                      $sunday = strtotime('sunday this week');
                      echo $this_week_ed = date("Y-m-d",$sunday).") <br>";
                      ?>
                      
                    </option>
                    <option>Później</option>
                    </select>
                    </div>

                    <!-- Formularz z miejscem zdarzenia -nieużwyane 

                <div class="form-group">
                    <label for="place">Miejsce zdarzenia:</label>
                    <textarea height="100%" class="form-control" id="place" placeholder="Wpisz miejsce zdarzenia..." name="place" ></textarea>
                </div>

                -->
               <input type="hidden" name="autor" id="autor" value="{{Auth::user()->name }}">

                     
                 <input type="hidden" name="status" id="status" value="Niewykonane">
   
    <div class="form-group">
                        <label for="private">Wpis prywatny?  </label>
                        <select class="form-control text-primary" name="private" id="private">
                   <option>Nie</option>
                   <option>Tak</option>
                 </select>
    </div>
    <label for="form-check"> Projekt grupowy? [funkcja w rozwoju] </label>
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="grupowy" value="Tak" checked>
  <label class="form-check-label" for="inlineRadio1">Tak</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="niegrupowy" value="Nie">
  <label class="form-check-label" for="inlineRadio2">Nie</label>
</div>
                <button type="submit" class="btn btn-default">Dodaj wpis</button>
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
