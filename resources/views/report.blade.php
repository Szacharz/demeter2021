@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Demeter</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Strona główna</a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Dodawanie wpłaty </h3>
                <p> Dodaj nowy przychód </p>
              </div>
              <div class="icon">
              
              </div>
              <a href="payin" class="small-box-footer">Kliknij by przejść dalej <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Dodaj wypłatę <sup style="font-size: 20px"></sup></h3>
                <p> Dodaj nowy rozchód <p>
              </div>
              <div class="icon">
                
              </div>
              <a href="payout" class="small-box-footer">Kliknij by przejść dalej <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Raport miesięczny</h3>

                <p>Kliknij, by utworzyć Raport miesięczny</p>
              </div>
              <div class="icon">
         
              </div>
              <a href="report" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Historia Raportów</h3>

                <p>Kliknij, aby przejrzeć historię raportów</p>
              </div>
              <div class="icon">
              
              </div>
              <a href="reporthis" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
               
          <div class="row">
          <div class="col-md-12">
          <br />
          <h3 align="center"> RAPORT WPŁAT</h3>
          <br />
          <table class="table table-bordered">
          <tr>
          <th>Numer dowodu wpłaty</th>
          <th>Data</th>
          <th>Treść</th>
          <th>Kwota przychodu</th>
          <th>Edytuj</th>
          <th>Usuń</th>
          </tr>
          @foreach($wplata as $row)
          <tr>
          <td>{{$row['id']}}</td>
          <td>{{$row['data']}}</td>
          <td>{{$row['tresc']}}</td>
          <td>{{$row['kwota_przychodu']}}</td>
          <td>
          <a href={{"edit/".$row['id']}}>Edytuj</a>
          </td>
          <td></td>
          </tr>
          @endforeach
          </table>
          <br />
          <h3 align="center"> RAPORT WYPŁAT</h3>
          <br />
          <table class="table table-bordered">
          <tr>
          <th>Numer dowodu wypłaty</th>
          <th>Data</th>
          <th>Treść</th>
          <th>Kwota rozchodu</th>
          <th>Edytuj</th>
          <th>Usuń</th>
          </tr>
          @foreach($wyplata as $row)
          <tr>
          <td>{{$row['numer_dowodu_wyplaty']}}</td>
          <td>{{$row['data']}}</td>
          <td>{{$row['tresc']}}</td>
          <td>{{$row['kwota_rozchodu']}}</td>
          <td></td>
          <td></td>
          </tr>
          @endforeach
          </table>
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