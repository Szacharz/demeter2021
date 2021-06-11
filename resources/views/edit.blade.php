@extends('layouts.admin')

@section('content')


    <!-- Main content -->
    <section class="content">
      
    <div class="container">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
        <div class="card">
            <!-- Form -->
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
               <div class="card-header"> <h1>Edycja Wpisu o ID: {{$usterki['id_usterki']}}</h1>
                <p class="description">Dodaj nowy Wpis, wypełniajac formularz.</p>
               <!-- Input fields -->
                <div class="form-group">
                <div class="card-body">
                    <label for="tresc">Opis wpisu:</label>
                    <input type="text" class="form-control" id="tresc" placeholder="Podaj treść wpisu..." name="tresc" value="{{$usterki['tresc']}}">
                </div>
                <div class="form-group">
                    <label for="data">Data wpisu:</label>
                    <input type="date" class="form-control" id="data"  name="data"  value="{{$usterki['data']}}" >
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
                <div class="form-group">
                    <label for="place">Miejsce zdarzenia (Opcjonalne):</label>
                    <input type="text" class="form-control" id="place" placeholder="Wpisz miejsce zdarzenia..." name="place" value="{{$usterki['place']}}">
                </div>
                <div class="form-group">
                    <label for="autor"></label>
                    <input type="hidden" class="form-control"   name="autor" id="autor" value="{{$usterki['autor']}}" >
            
                        <label for="autor">Status:</label>
                        <select class="form-control text-danger" name="status" id="status" value="{{$usterki['status']}}">
                   <option>Niewykonane</option>
                  <option>Wykonane</option>
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