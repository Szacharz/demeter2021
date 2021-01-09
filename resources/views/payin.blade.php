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
               

              

           
           

            
               
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div id="menu">

			
<h3 class="button">DODAWANIE WPŁATY</h3>
    


</div>

<div id="contener">

<form method="post" enctype="multipart/form-data">

<table>
    <tr>
        <td>Data</td><td><input type="text" name="nazwa"
        <?php
            if (isset($nazwa)){
                echo 'value="'.$nazwa.'"';
            }
        ?>>
        <?php
            if (isset($error['nazwa'])){
                echo $error['nazwa'];
            }
        ?>
        </td>
    </tr>
    <tr>
        <td>Opis</td><td><textarea name="opis" rows="8" cols="50"><?php if (isset($opis)) echo $opis; ?></textarea>
        <?php
            if (isset($error['opis'])){
                echo $error['opis'];
            }
        ?>
    </td>
    </tr>
    <tr>
    <td>Kwota przychodu</td><td><input type="text" name="nazwa"
        <?php
            if (isset($nazwa)){
                echo 'value="'.$nazwa.'"';
            }
        ?>>
        <?php
            if (isset($error['nazwa'])){
                echo $error['nazwa'];
            }
        ?>
        </td>
    </tr>
   
    <tr>
        <td>Kategoria</td>
        <td>
            <select name="kategoria">
                <option value="laptopy" <?php if (isset($kategoria) && $kategoria == "laptopy") echo 'selected';?>>Laptopy</option>
                <option value="komputery" <?php if (isset($kategoria) && $kategoria == "komputery") echo 'selected';?>>Komputery</option>
                <option value="telefony" <?php if (isset($kategoria) && $kategoria == "telefony") echo 'selected';?>>Telefony</option>
                <option value="siec" <?php if (isset($kategoria) && $kategoria == "siec") echo 'selected';?>>Sieć</option>
                <option value="oprogramowanie" <?php if (isset($kategoria) && $kategoria == "oprogramowanie") echo 'selected';?>>Oprogramowanie</option>
                <option value="tusze" <?php if (isset($kategoria) && $kategoria == "tusze") echo 'selected';?>>Tusze</option>
            </select>
        </td>
    </tr>
</table>

<br><br>

<input class="button" type="submit" name="dodaj" value="Dodaj wpłatę">

</form>

</div>

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  
    @endsection
