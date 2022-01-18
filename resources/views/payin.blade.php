@extends('layouts.admin')


<!-- Bootstrap library -->


@section('content')
<div style="text-align: right; margin-right: 10px">
        <h6><u> <a href="/profile">  @foreach($departments as $row) Zalogowany jako: {{Auth::user()->name }}, dział {{$row['departments']}} @endforeach  </a>  </u></h6>
    </div>
    
<!-- Content Header (Page header) -->
    <!-- Main content -->
          <script type="text/javascript">
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
FormStuff.init();    // end of radio function for group assigment
</script>

<script>

function showDP(cbox){
 if (cbox.checked) {
   $('#datapozniej').css({
 display: "block"
   });
 }else{
   $('#datapozniej').css({
 display: "none"
   });
 }}
 
 function showDPNew(select)
 {
 if ($(select).val() == 'Wybierz z kalendarza') {
   $('#datapozniej').css({
 display: "block"
   });
   
   $("#datapozniej").focus();
 }
 else{
   $('#datapozniej').css({
 display: "none"
   });
   
$("#datapozniej").blur();
 }}


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
    
<style>
  .reveal-if-active {
  opacity: 0;
  max-height: 0;
  overflow: hidden;
  transform: scale(0.8);
  transition: 0.5s;
    opacity: 1;
    max-height: 100px;
    overflow: visible;
    padding: 10px 20px;
    transform: scale(1);
  }

</style>


<section class="content">
  <br /> <br />  

   <div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
        <div class="card">
        <div class="p-3 mb-2 bg-dark text-white">
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
                <div class="card-header">
                  <h1><i class="fa fa-plus-circle"></i> Formularz nowego wpisu</h1>
                <p class="description">Dodaj nowy Wpis, wypełniając formularz.</p>
                <!-- Input fields -->
                </div>
                </div>
                <div class="card-body">
                <div class="form-group">
                    <label for="tresc">*Opis wpisu:</label>
                    <textarea  height="100%" class="form-control" id="tresc" placeholder="Podaj treść wpisu..." name="tresc"></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="data" name="data"  value="<?php echo date('Y-m-d'); ?>" />
                </div>
                <div class="form-group">
                    <label for="deadline">Data zakończenia prac: </label>
                    <select class="form-control" name="deadline" id="deadline" onChange="showDPNew(this)">


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

                    <option value=" <?php date_default_timezone_set('Europe/Warsaw'); $monday = strtotime('monday this week'); $friday = strtotime('friday this week');echo $this_week_ed = date("Y-m-d",$friday); ?>">
                      Ten Tydzień (Do: 
                      <?php
                      date_default_timezone_set('Europe/Warsaw'); 
                      $monday = strtotime('monday this week');
                      $friday = strtotime('friday this week');
                      echo $this_week_ed = date("Y-m-d",$friday).") <br>";
                      ?>
                      
                    </option>
                    <option id='4'>Wybierz z kalendarza</option>  
                    <option id='5'>Nieokreślona</option>
                    </select>
                    <p>
                       <input id="datapozniej" name="datapozniej" type="date" value="<?php echo date('Y-m-d'); ?>" style="display:none"/>
                    </p>  
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
               <input type="hidden" name="department_id" id="department_id" value="{{Auth::user()->department_id }}">
    <div class="form-group">
                        <label for="private">Wpis prywatny?  </label>
                        <input type="hidden" name="private" value="0"/>
                    <input type="checkbox" name="private" value="1"/>
                    <label class="form-check-label" for="private">Tak</label>            
                    <!-- <select class="form-control text-primary" name="private" id="private">    
                    <option value="0">Nie</option>
                   <option value="1">Tak</option>
                 </select> -->
    </div>
    <div class="form-group">
    <label for="form-check"> Projekt grupowy? </label>
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
           <div class="row">
           <!-- Select na grupy -->
               <label for="grupy" class="control-label col-sm-3 text-nowrap">Grupa: </label>
                    <div class="col-sm-9">
                    <select id=select>
<option value="" disabled selected>Wybierz grupę...</option>
                    @foreach($grupa as $row)
                    <option data-othervalue="{{ $row['group_desc'] }}" data-someothervalue="{{ $row['id'] }}">{{ $row['group_desc'] }}</option>
                    @endforeach</option>
</select>
         </div>
            <!-- / select na grupy -->
         </div>
        <!-- / Expand Buttons -->
    </div>
</div>
     <div class="form-group">
        <label for="importance">Posiada priorytet?  </label>
       <input type="hidden" name="importance" value="0"/>
        <input type="checkbox" name="importance" value="1"/>
        <label class="form-check-label" for="importance">Tak</label>
       
      <hr>
                <!-- Input fields -->
                <div class="form-group">
                    <label for="tresc_nt"><u>Opcjonalnie</u> możesz utworzyć notatkę do wpisu.</label>
                    <textarea height="100%" class="form-control" name="tresc_nt" id="tresc_nt" placeholder="Wprowadź tekst notatki"></textarea>
                </div>
                <input type="hidden" name="autor" id="autor" value="{{Auth::user()->name }}">
                <input type="hidden" name="notki" id="notki" value="TAK">
                <input type="hidden" name=otherValue id=otherValue />
                <input type="hidden" name=someOtherValue id=someOtherValue />
                <script>
                    $('#select').change(function () {
                    var otherValue=$(this).find('option:selected').attr('data-othervalue');
                    var someOtherValue=$(this).find('option:selected').attr('data-someothervalue');
                    $('#otherValue').val(otherValue);
                    $('#someOtherValue').val(someOtherValue);
                    });
                    </script>
                 {{-- <div class="form-group">
                     
                  <label for="photo">Dodaj zdjęcie do notatki (opcjonalne):  </label>  <br>
                      <input type="file"  name="photo" id="photo" accept="image.png, image/jpeg" aria-describedby="fileHelp"> --}}
                      {{-- Przycisk dt ładowania obrazku --}}       
                      {{-- <small id="fileHelp" class="form-text text-muted">Dodaj zdjęcie do swojej notatki. Rozmiar zdjęcia nie może przekraczać 2MB.</small>
                     
                  </div> --}}

                  <hr>

          <p align="right">    
            <button type="submit" class="btn btn-primary">Dodaj wpis</button>
            </p>
                <!-- End input fields -->
                </div>
                </form>
                </div>
            </form>
            <!-- Form end -->
        </div>
    </div>
</div>
  </div>
  </div>            <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
     
    </section>
    <!-- /.content -->

   <script>
function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}
sleep(500).then(() => {
  document.getElementById("tresc").focus();
});
   </script> 

    @endsection
