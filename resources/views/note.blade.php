@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">

          <script>
          $(document).ready(function() {
                var t = $('#Notki').DataTable( {
                    "columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0,
                     "info": true,
                                               } ],
                  "lengthMenu": [[-1, 4, 8, 10], ["All", 4, 8, 10 ]],
                  "order": [[ 1, 'asc' ]]
                                  } );
                t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                 cell.innerHTML = i+1;
                                                     } );
                         } ).draw();
                 });
                   
          </script>


          <div class="container-xl">
    <div class="row justify-content-center align-items-center">
            <!-- Form -->
            @if(count($errors)>0)
           <ul>
      @foreach($errors->all() as $error)
    <li class="alert alert-danger">{{$error}}</li>
    @endforeach
    </ul>
    @endif
            <form class="form-example" action="/notesubmit" method="POST">
            @csrf
           
            <input type="hidden" name="id_usterki" id="id_usterki" value="{{$usterki['id_usterki']}}">
            
            <form class="form-inline">
          <div class="form-group mb-2">
           <div class="card-header"> <h1>Nazwa Wpisu: {{$usterki['tresc']}} </h1> </div>
           </div>
            <div class="card-body">
            <div class="form-group">
                    <label for="tresc">Informacje:</label>
                </div>
                <p class="card-text">  <b>1.</b> Karta Wpisu o <b>ID: {{$usterki['id_usterki']}}</b>   &nbsp&nbsp&nbsp&nbsp   <b> 2.</b> Autor wpisu:<b> {{$usterki['autor']}} </b> &nbsp&nbsp&nbsp&nbsp  <b> 3.</b> Status:<b> {{$usterki['status']}} </b> </p>
     
                
                <p class="card-text"> <b> 4.</b> Tabela notatek:</p> 
                
                <form class="center" >
              <table id="Notki" class="table table-striped table-bordered text-center table-hover table-responsive-lg">
        <thead>
            <tr>
                <th>LP</th>
                <th>Treść</th>
                <th>Autor</th>
            </tr>
        </thead>
        @foreach($notatki as $row)
   </div>  
      <tr>
        <td></td>
        <td>{{$row['tresc_nt']}}</td>
        <td>{{$row['autor']}}</td>
      </tr>
      @endforeach
      </table>
                    <div>
                    </div>
                    <br>
                    </br>
                    <div class="form-group mb-2">
                <h3>Dodawanie nowej notatki</h3>
                <p> Dodaj nową notatkę, uzupełniając formularz. Potem Kliknij "Dodaj notatkę".</p>
                <!-- Input fields -->
                <div class="form-group">
                    <label for="tresc_nt">Treść notatki</label>
                    <textarea height="100%" class="form-control" name="tresc_nt" id="tresc_nt" placeholder="Wprowadź tekst notatki"></textarea>
                </div>
                <input type="hidden" name="autor" id="autor" value="{{Auth::user()->name }}">
                <input type="hidden" name="notki" id="notki" value="TAK">
                <button type="submit" class="btn btn-primary">Dodaj notatkę</button>
                <!-- End input fields -->
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