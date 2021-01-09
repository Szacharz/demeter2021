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

    <div id="menu">

			
<h3 class="button">Produkty</h3>
    
        <a href="dodaj.php" class="button"<p>Dodaj</p></a>
        <a href="edytuj.php" class="button"><p>Edytuj</p></a>
        <a href="usun.php" class="button"><p>Usuń</p></a>


</div>

<div id="contener">

<form method="post" enctype="multipart/form-data">

<table>
    <tr>
        <td>Nazwa produktu</td><td><input type="text" name="nazwa"
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
        <td>Zdjęcie</td><td><input type="file" name="zdjecie">
        <?php
            if (isset($error['zdjecie'])){
                echo $error['zdjecie'];
            }
        ?>
        </td>
    </tr>
    <tr>
        <td>Cena</td><td><input type="text" name="cena"
        <?php
            if (isset($cena)){
                echo 'value="'.$cena.'"';
            }
        ?>>
        <?php
            if (isset($error['cena'])){
                echo $error['cena'];
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

<input class="button" type="submit" name="dodaj" value="Dodaj produkt">

</form>

</div>

    @endsection
