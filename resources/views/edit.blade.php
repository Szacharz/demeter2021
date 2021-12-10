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
.border {  
  border-color: orange;  
  border-width: 5px;  
  border-style: inset;  
  }  
</style>


         @if(Auth::user()->department_id == $usterki['department_id'])
 <section class="content">
    <br>  
    <div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-sm-8">
        <div class="card">
           <div class="p-3 mb-2 bg-dark text-white"> <!-- Form -->
               <div class="card-header" align="center"> <h1>Edycja Wpisu o ID: {{$usterki['id_usterki']}}</h1>
                <p class="description text-red">Pozostaw pole bez zmian, jeżeli nie chcesz zmieniać daty zakończenia prac, statusu lub prywatności.</p>
              </div>
              </div>
              <!-- Input fields -->
                  <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <center>
                  <b>Informacje o wpisie: </b>
                      </center>
              <table class="table table-striped table-bordered text-center table-hover table-responsive-lg">
                <thead class="thead-dark">
                  <tr>
                    <th>Opis Wpisu</th> 
                    <th>Data zakończenia prac</th> 
                    <th>Status Wpisu</th> 
                    <th>Prywatny</th> 
                    @if($usterki['group_desc'] != null)
                    <th>Grupa</th> 
                    @endif
                </thead><tbody>
                  <tr>
                    <td>{{$usterki['tresc']}} </td>
                    <td>{{$usterki['deadline']}} </td>
                    <td>{{$usterki['status']}}</td>
                    <td> @if($usterki['private'] == 1) Tak  @else  Nie @endif</td>
                    @if($usterki['group_desc'] != null)
                    <td>{{$usterki['group_desc']}}</td>
                    @endif
                </tr>
                </tbody>
              </table></li></ul> 
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
                    <option id='5'>Nieokreślona</option>
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
                 <div class="form-group">
                  <label for="form-check"> Zmień grupę </label>
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