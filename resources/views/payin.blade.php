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
     var FormStuff = {
  
  init: function() {
    // kick it off once, in case the radio is already checked when the page loads
    this.applyConditionalRequired();
    this.bindUIActions();
  },
  
  bindUIActions: function() {
    // when a radio or checkbox changes value, click or otherwise
    $("input[type='radio'], input[type='checkbox']").on("change", this.applyConditionalRequired);
  },
  
  applyConditionalRequired: function() {
    // find each input that may be hidden or not
    $(".require-if-active").each(function() {
      var el = $(this);
      // find the pairing radio or checkbox
      if ($(el.data("require-pair")).is(":checked")) {
        // if its checked, the field should be required
        el.prop("required", true);
      } else {
        // otherwise it should not
        el.prop("required", false);
      }
    });
  }

};

FormStuff.init();
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
    
<style>
  .reveal-if-active {
  opacity: 0;
  max-height: 0;
  overflow: hidden;
  transform: scale(0.8);
  transition: 0.5s;
  input[type="radio"]:checked ~ &,
  input[type="checkbox"]:checked ~ & {
    opacity: 1;
    max-height: 100px;
    overflow: visible;
    padding: 10px 20px;
    transform: scale(1);
  }
}
</style>




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
               <input type="hidden" name="id_autora" id="id_autora" value="{{Auth::user()->id }}">
                     
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
    <input class="form-check-input" data-toggle="collapse" data-target="#collapseExample" aria-controls="collapseExample" aria-expanded="false" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Tak">
  <label class="form-check-label" for="inlineRadio1">Tak</label>
</div>


<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Nie" checked>
  <label class="form-check-label" for="inlineRadio2">Nie</label>
</div>

<div class="collapse pl-4" id="collapseExample">
        <!-- Expanded Buttons -->
           
        <label for="grupy" class="control-label col-sm-3 text-nowrap">Grupa: </label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="grupy" name="grupy" value="{{$users['name']}}">
         
        <!-- / Expand Buttons -->
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
