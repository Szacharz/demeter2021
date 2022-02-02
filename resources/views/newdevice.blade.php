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
            <form class="form-example" action="/devicesubmit" method="POST">
            @csrf
                <div class="card-header">
                  <h1><i class="fa fa-plus-circle"></i> Wypożyczenie sprzętu</h1>
                <p class="description">Dodaj nową pozycję wypożyczonego sprzętu.</p>
                <!-- Input fields -->
                </div>
                </div>
                <div class="card-body">
                <div class="form-group">
                    <label for="tresc">*Nazwa sprzętu:</label>
                    <input type="text" class="form-control" id="name" placeholder="Wprowadź nazwę sprzętu..." name="name">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="data" name="data"  value="<?php echo date('Y-m-d'); ?>" />
                </div>
                
                    <!-- Formularz z miejscem zdarzenia -nieużwyane 

                <div class="form-group">
                    <label for="place">Miejsce zdarzenia:</label>
                    <textarea height="100%" class="form-control" id="place" placeholder="Wpisz miejsce zdarzenia..." name="place" ></textarea>
                </div>

                -->
               <input type="hidden" name="autor" id="autor" value="{{Auth::user()->name }}">
               <input type="hidden" name="id_autora" id="id_autora" value="{{Auth::user()->id }}">
               <input type="hidden" name="status" id="status" value="Pożyczony">

               <div class="form-group">
                <label for="name">Komu pożyczono: </label>
                <input type="text" class="form-control" id="towho" name="towho" placeholder="Wprowadź komu pożyczono sprzęt..." >
            </div>




     <div class="form-group">
      
       
      <hr>
                <!-- Input fields -->
                <div class="form-group">
                    <label for="tresc_nt"><u>Opcjonalnie</u> możesz dodać dodatkowe informacje do sprzętu, takie jak adres MAC, numer seryjny itd.:</label>
                    <textarea height="100%" class="form-control" name="info" id="info" placeholder="Wprowadź dodatkowe informacje..."></textarea>
                </div>
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
