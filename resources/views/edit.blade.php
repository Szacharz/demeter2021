@extends('layouts.admin')

@section('content')

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
 if ($(select).val() == 'Później') {
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
 </script>


    <!-- Main content -->
   
            @if(count($errors)>0)
           <ul>
      @foreach($errors->all() as $error)
    <li class="alert alert-danger">{{$error}}</li>
    @endforeach
    </ul>
    @endif

            <form class="form-example" action="/edit" method="POST">
            @csrf
            <input type="hidden" name="id_usterki" id="id_usterki" value="{{$usterki['id_usterki']}}">
         <br>

<style>
.myauto{
margin-top: auto;
margin-bottom: auto;
}
</style>


         @if(Auth::user()->department_id == $usterki['department_id'])
 <section class="content">
    <br>  
    <div class="container">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
        <div class="card">
           <div class="p-3 mb-2 bg-dark text-white"> <!-- Form -->
               <div class="card-header"> <h1>Edycja Wpisu o ID: {{$usterki['id_usterki']}}</h1>
                <p class="description text-red">Pozostaw pole bez zmian, jeżeli nie chcesz zmieniać deadlinu, statusu lub prywatności.</p>
              </div>
              </div>
              <!-- Input fields -->
                  <div class="card-body">
                  <div class="form-group text-info">
                  Informacje o wpisie:
              <div class="text-info">1. Opis wpisu: {{$usterki['tresc']}}     2. Data zakończenia prac: {{$usterki['deadline']}}  </div>
                <div class="text-info">3. Status wpisu: {{$usterki['status']}} @if($usterki['private'] == 1)  4. Prywatny: Tak  @else 4. Prywatny: Nie @endif</div>
                </div>
                   <div class="form-group">
                    <label for="tresc">Opis wpisu:</label>
                    <input type="text" class="form-control" id="tresc" placeholder="Podaj treść wpisu..." name="tresc" value="{{$usterki['tresc']}}">
                </div>
                <!-- Edycja daty wpisu, if usefull -->
                <!-- <div class="form-group">
                    <label for="data">Data wpisu:</label>
                    <input type="date" class="form-control" id="data"  name="data"  value="{{$usterki['data']}}" >
                </div> -->
                <input type="hidden" class="form-control" id="data"  name="data"  value="{{$usterki['data']}}">
                <input type="hidden" class="form-control" id="deadline"  name="deadline"  value="{{$usterki['deadline']}}">
                <div class="form-group">
                <label for="deadline">Data zakończenia prac</label>
                    <select class="form-control" name="deadline" id="deadline" onChange="showDPNew(this)" >

                    <option value="{{$usterki['deadline']}}" selected disabled hidden> Zmień datę zakończenia prac..</option>
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
                    <option id='4'>Później</option>
                    </select>
                    <p>
                       <input id="datapozniej" name="datapozniej" type="date" value="<?php echo date('Y-m-d'); ?>" style="display:none"/>
                    </p>  
                      </div>
                <!-- <div class="form-group">
                    <label for="place">Miejsce zdarzenia (Opcjonalne):</label>
                    <input type="text" class="form-control" id="place" placeholder="Wpisz miejsce zdarzenia..." name="place" value="{{$usterki['place']}}">
                </div> -->
                <div class="form-group">
                    <label for="autor"></label>
                    <input type="hidden" class="form-control"   name="autor" id="autor" value="{{$usterki['autor']}}" >
                    <input type="hidden" class="form-control"   name="status" id="status" value="{{$usterki['status']}}" >
                        <label for="autor">Status:</label>
                        <select class="form-control text-danger" name="status" id="status">
                        <option value="{{$usterki['status']}}" selected disabled hidden> Zmień status...</option>
                   <option>Niewykonane</option>
                  <option>Wykonane</option>
                     </select> 
                </div>
                <input type="hidden" class="form-control"   name="private" id="private" value="{{$usterki['private']}}" >
                     <div class="form-group">
                     <label for="autor">Wpis prywatny:</label>
                        <select class="form-control" name="private" id="private">
                        <option value="{{$usterki['private']}}" selected disabled hidden> Zmień prywatność...</option>
                   <option value="0" style="color:orangered">Nie</option>
                   <option value="1" style="color:steelblue">Tak</option>
                     </select>
                 </div>
 
                <p align="right">
                <button type="submit" class="btn btn-primary">Edytuj wpis</button>
               </p> 


               <!-- End input fields -->
                </form>
                </div>
            </form>
            <!-- Form end -->
        </div>
        </div>
    </div>
</div>
  </div>         
</div>


@else
            <div class="container-xl">
            <div class="col-lg my-auto">

  <div class="card text-white bg-danger">
  <div class="card-header"><h1><i class="fa fa-shield"></i> Edycja Wpisu </h1></div>
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