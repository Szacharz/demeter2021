@extends('layouts.admin')


<!-- Bootstrap library -->
<?php
use Carbon\Carbon;
$todayDate = Carbon::now()->format('Y-m-d');
header('Refresh: 300'); ?>

@section('content')

<div style="text-align: right; margin-right: 10px; margin-top: 3px">
        <h6><img src="img/pinkrectangle.png" alt="Wygląd wpisu prywatnego" width="60" height="25"> - wpis prywatny 
        <img src="img/lightsalomonrectangle.png" alt="Wygląd wpisu grupowego" width="60" height="25"> - zadanie grupowe
        <img src="img/deadline.png" alt="Wygląd wpisu deadlinu"> - przekroczony deadline
        <u style="margin-left: 15px">  @foreach($departments as $row) Zalogowany jako: {{Auth::user()->name }}, dział {{$row['departments']}} @endforeach  </u></h6>
    </div>

    <!-- Main content -->
    <section class="content">

      <!--Niżej są karty, gdybym potrzebował
           <div class="container-fluid">
        Small boxes (Stat box)
        <div class="row">
          <div class="col-lg-3 col-6">
            small box 
            <div class="small-box bg-info">
            <a href="payin">
              <div class="inner">
              <div class="container">
                <h3>Dodawanie wpisu </h3>
                <p> Dodaj nowe zgłoszenie  </p>
              </div>
              <div class="icon">
              </div>
              </div>
              <a href="payin" class="small-box-footer">Kliknij by przejść dalej <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        
          <div class="col-lg-3 col-6">
           
            <div class="small-box bg-success">
            <a href="report">
              <div class="inner">
              <div class="container">
                <h3>Lista zgłoszeń <sup style="font-size: 20px"></sup></h3>
                <p> Podgląd wszystkich zgłoszeń <p>
              </div>
              <div class="icon">
                </div>
              </div>
              <a href="report" class="small-box-footer">Kliknij by przejść dalej <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
       
          <div class="col-lg-3 col-6">
         
            <div class="small-box bg-warning">
            <a href="payout">
              <div class="inner">
              <div class="container">
                <h3>Lista Prywatna </h3>

                <p>Podgląd prywatnych zadań </p>
              </div>
              <div class="icon">
              </div>
              </div>
              <a href="payout" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
      
         <div class="col-lg-3 col-6">
         
            <div class="small-box bg-danger">
            <a href="reporthis">
              <div class="inner">
              <div class="container">
                <h3>Archiwum</h3>

                <p>Podgląd archiwalnych wpisów</p>
              </div>
              <div class="icon">
              </div>
              </div>
              <a href="reporthis" class="small-box-footer">Kliknij by przejść dalej<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          -->




          <style>
a
{text-decoration: none;
 background-color: none;
 color:black; }

 b
{text-decoration: none;
 background-color: none;
 color:red; }

 c
{text-decoration: none;
 background-color: none;
 color:orangered; }

.d{
  text-decoration: none;
  background-color: lightsalmon;
}

 .cell-breakWord {
  word-break: break-word;
 }
 .w3-center {
    text-align: center!important;
}
.td-yes {
  background-color: pink;
}
</style>          
         
          <script>
$(document).ready(function() {
    var t = $('#usterki').DataTable( {
      "language":{
    "processing": "Przetwarzanie...",
    "search": "Znajdź:",
    "lengthMenu": "Pokaż _MENU_ pozycje",
    "info": "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
    "infoEmpty": "Pozycji 0 z 0 dostępnych",
    "infoFiltered": "(filtrowanie spośród _MAX_ dostępnych pozycji)",
    "loadingRecords": "Wczytywanie...",
    "zeroRecords": "Nie znaleziono pasujących pozycji",
    "paginate": {
        "first": "Pierwsza",
        "previous": "Poprzednia",
        "next": "Następna",
        "last": "Ostatnia"
    },
    "aria": {
        "sortAscending": ": aktywuj, by posortować kolumnę rosnąco",
        "sortDescending": ": aktywuj, by posortować kolumnę malejąco"
    },
    "autoFill": {
        "cancel": "Anuluj",
        "fill": "Wypełnij wszystkie komórki <i>%d<\/i>",
        "fillHorizontal": "Wypełnij komórki w poziomie",
        "fillVertical": "Wypełnij komórki w pionie",
        "info": "Informacje"
    },
    "buttons": {
        "collection": "Zbiór <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
        "colvis": "Widoczność kolumny",
        "colvisRestore": "Przywróć widoczność",
        "copy": "Kopiuj",
        "copyKeys": "Naciśnij Ctrl lub u2318 + C, aby skopiować dane tabeli do schowka systemowego. <br \/> <br \/> Aby anulować, kliknij tę wiadomość lub naciśnij Esc.",
        "copySuccess": {
            "1": "Skopiowano 1 wiersz do schowka",
            "_": "Skopiowano %d wierszy do schowka"
        },
        "copyTitle": "Skopiuj do schowka",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
            "-1": "Pokaż wszystkie wiersze",
            "1": "Pokaż 1 wiersz",
            "_": "Pokaż %d wierszy"
        },
        "pdf": "PDF",
        "print": "Drukuj"
    },
    "emptyTable": "Brak danych w tabeli",
    "searchBuilder": {
        "add": "Dodaj warunek",
        "clearAll": "Wyczyść wszystko",
        "condition": "Warunek",
        "data": "Dane",
        "button": {
            "_": "Aktywne zapytania",
            "0": "Budowanie zapytania"
        },
        "conditions": {
            "array": {
                "contains": "Zawiera",
                "empty": "Pusta",
                "equals": "Równa się",
                "not": "Nie",
                "notEmpty": "Nie pusta",
                "without": "Bez"
            },
            "date": {
                "after": "Po",
                "before": "Przed",
                "between": "Pomiędzy",
                "empty": "Pusto",
                "equals": "Równa",
                "not": "Nie",
                "notBetween": "Nie pomiędzy",
                "notEmpty": "Nie pusta"
            },
            "number": {
                "between": "Pomiędzy",
                "empty": "Pusty",
                "equals": "Równy",
                "gt": "Większy niż",
                "gte": "Równy lub większy niż",
                "lt": "Mniejszy niż",
                "lte": "Równy lub mniejszy niż",
                "not": "Nie",
                "notBetween": "Nie pomiędzy",
                "notEmpty": "Nie pusty"
            },
            "string": {
                "contains": "Zawiera",
                "empty": "Pusty",
                "endsWith": "Kończy się na",
                "equals": "Równa się",
                "not": "Nie",
                "notEmpty": "Nie pusty",
                "startsWith": "Zaczyna się od"
            }
        },
        "deleteTitle": "Czyszczenie",
        "leftTitle": "Lewy",
        "logicAnd": "I",
        "logicOr": "Lub",
        "rightTitle": "Prawy",
        "title": {
            "_": "Aktywne zapytania",
            "0": "Budowanie zapytania"
        },
        "value": "Wartość"
    },
    "datetime": {
        "amPm": [
            "am",
            "pm"
        ],
        "hours": "Godzina",
        "minutes": "Minuta",
        "next": "Następne",
        "previous": "Poprzednie",
        "seconds": "Sekunda",
        "unknown": "nieznana"
    },
    "editor": {
        "close": "Zamknij",
        "create": {
            "button": "Dodaj",
            "submit": "Dodaj",
            "title": "Dodawanie nowego wpisu"
        },
        "edit": {
            "button": "Edytuj",
            "submit": "Aktualizuj",
            "title": "Aktualizacja wpisu"
        },
        "error": {
            "system": "Nastąpił błąd systemu (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Więcej informacji&lt;\\\/a&gt;).<\/a>"
        },
        "multi": {
            "info": "Wybrane pole zawiera wiele elementów z różnymi wartościami. Aby zmienić ich wartość kliknij w nie, inaczej zachowane zostaną ich wartości domyślne.",
            "noMulti": "Ta wartość może być edytowana oddzielnie - niezależnie od grupy.",
            "restore": "Cofnij zmiany",
            "title": "Pole z wieloma wartościami"
        },
        "remove": {
            "button": "Usuń",
            "confirm": {
                "_": "Czy na pewno chcesz usunąć %d rzędów?",
                "1": "Czy na pewno chcesz usunąć 1 rząd?"
            },
            "submit": "Usuń",
            "title": "Usuwanie"
        }
    },
    "searchPanes": {
        "clearMessage": "Wyczyść wszystkie",
        "collapse": {
            "_": "Aktywne grupowania (%d)",
            "0": "Grupowanie"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Brak paneli wyszukań",
        "loadMessage": "Ładuję panele wyszukań",
        "title": "Aktywne filtry"
    },
    "searchPlaceholder": "Szukaj w tabeli...",
    "select": {
        "_": "zaznaczono %d wierszy",
        "1": "zaznaczono %d wiersz",
        "cells": {
            "_": "zaznaczono %d komórek",
            "1": "zaznaczono %d komórkę"
        },
        "columns": {
            "_": "zaznaczono %d kolumn",
            "1": "zaznaczono %d kolumnę"
        }
    }
},
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0,
            "info": true,
        } ],
        "lengthMenu": [[-1, 10, 25, 50], ["Wszystkie", 10, 25, 50, ]],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );

$(document).ready(function () {
 
 window.setTimeout(function() {
     $(".alert").fadeTo(500, 0).slideUp(500, function(){
         $(this).remove(); 
     });
 }, 1500);
 });

 $(document).on('click','.Change',function(){
         let id = $(this).attr('data-id');
         $('#id').val(id);
    });
</script>

<br>
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

<div class="container-xl">
    <div class="column"> <!-- przez to że jest zamknięta w kolumnie, jest mniejsza datatabela -->
         <div class="card">
            <div class="card-header">
            <div class="col-lg">
              <div class="d-inline">
              <a class="btn btn-info" href='http://dementor/payin' role="button"><h6> <i class="fa fa-plus"></i> Utwórz nowy wpis </h6></a>
              </div>
              <div align="center">
    <h1 ><i class="fa fa-list"></i> Wszystkie wpisy </h1>
    <p> Lista wszystkich wpisów do systemu. </p>
  </div>
  </div>
</div>

<div class="card-body">
<table class="table table-striped table-bordered text-center table-hover table-responsive-lg" id="usterki"> 
<thead class="thead-dark">
      <tr>
      <th>LP</th>
      <th>Data</th>
      <th>Treść</th>
      <th>Deadline</th>
      <th>Autor</th>
      <th>Notatki</th>
      <th>Edytuj</th>
      <th>Zakończ</th>
      </tr>
      </thead>
   </div>
   @foreach($usterki as $row)  
   @if($row['importance'] == '0')
      <tr>
      @if($row['private'] == '0' and $row['group_desc'] === NULL)
        <td></td>
      @elseif ($row['private'] == '0' and $row['group_desc'] !== NULL)
      <td class="d"></td>
      @else
      <td class="td-yes"></td>
      @endif
        <td style="width:85px"><a href={{"note/".$row['id_usterki']}}>{{$row['data']}}</td>
        <td class="cell-breakWord"><a href={{"note/".$row['id_usterki']}}>{{$row['tresc']}}</td>
    
        @if($row['deadline'] < $todayDate)
        <td><a href={{"note/".$row['id_usterki']}}><c>{{$row['deadline']}}</c></td>
        @else 
        <td><a href={{"note/".$row['id_usterki']}}>{{$row['deadline']}}</td>
        @endif
        <td><a href={{"note/".$row['id_usterki']}}>{{$row['autor']}}</td>
        <td class="text-info"> {{$row['notki']}} </td>
        <td>
          <a href={{"edit/".$row['id_usterki']}} class="btn btn-sm btn-default">Edytuj</a>
          </td>
          <td>
        <a href="#"  data-id={{$row['id_usterki']}} class="btn btn-sm btn-danger Change" data-toggle="modal" data-target="#ChangeModal">Zakończ</a>
        </td>
      </tr>
 @else
      <tr>
      @if($row['private'] == '0' and $row['group_desc'] === NULL)
        <b><td></td></b>
      @elseif ($row['private'] == '0' and $row['group_desc'] !== NULL)
      <b><td class="d"></td></b>
      @else
     <b> <td class="td-yes"></td></b>
      @endif

        <td style="width:85px"><a href={{"note/".$row['id_usterki']}}><b>{{$row['data']}}</b></td>
        <td class="cell-breakWord"><a href={{"note/".$row['id_usterki']}}><b>{{$row['tresc']}}</b></td>
        <td><a href={{"note/".$row['id_usterki']}}><b>{{$row['deadline']}}</b></td>
        <td><a href={{"note/".$row['id_usterki']}}><b>{{$row['autor']}}</b></td>
        <td class="text-danger"><b> {{$row['notki']}} </b></td>
        <td>
          <a href={{"edit/".$row['id_usterki']}} class="btn btn-sm btn-default">Edytuj</a>
          </td>
        <td>
        <a href={{"Change/".$row['id_usterki']}} class="btn btn-sm btn-danger">Zakończ</a>
        <!-- <a href="#"  data-id={{$row['id_usterki']}} class="btn btn-sm btn-danger Change" data-toggle="modal" data-target="#ChangeModal">Zakończ</a> -->
        </td>
      </tr>
      @endif
      @endforeach
    </table>

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

      
      <div class="modal modal-danger fade" id="ChangeModal"  role="dialog" aria-labelledby="Change" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Zakończ Wpis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('usterki.Change', 'id') }}" method="post">
                @csrf
                @method('Change')
                <input id="id" type="hidden" name="id")>
                <h6 class="text-center">Jesteś pewien, że chcesz Zakończyć ten wpis?</h6>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Anuluj</button>
                <button type="submit" class="btn btn-sm btn-danger">Tak, zakończ</button></a>
            </div>  
        </div>
    </div>
</div>
</div>
</div>
    </section>
    <!-- /.content -->
    @endsection
