@extends('layouts.admin')


<!-- Bootstrap library -->

<?php header('Refresh: 300');
use Carbon\Carbon;
$todayDate = Carbon::now()->format('Y-m-d');
?>

@section('content')
<div style="text-align: right; margin-right: 10px; margin-top: 3px">
        <img src="img/deadline.png" alt="Wygląd wpisu deadlinu"> - przekroczony deadline
        <u style="margin-left: 15px">  @foreach($departments as $row) Zalogowany jako: {{Auth::user()->name }}, dział {{$row['departments']}} @endforeach  </u></h6>
    </div>>

    <!-- Main content -->
    <section class="content">



          <style>
a
{text-decoration: none;
 background-color: none;
 color:black; }

 .cell-breakWord {
  word-break: break-word;
 }
 b
{text-decoration: none;
 background-color: none;
 color:red; }
 c
{text-decoration: none;
 background-color: none;
 color:orangered; }

</style> 

<script>
$(document).ready(function() {
    var t = $('#group').DataTable( {
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
    <div class="center">
        <div class="card">
        <div class="card-header">
            <div class="col-lg">
                <div class="d-inline">
                    <div class="form-group mb-2" align="center">
                    <h1><i class="fa fa-list"></i> Zadania grupowe</h1>
                        <p> Lista zadań do których przypisana jest grupa. </p>
                    </div>
                </div>
            </div>
        </div>
<div class="card-body">
<table class="table table-striped table-bordered text-center table-hover table-responsive-xl"  id="group"> 
<thead class="thead-dark">
      <tr>
      <th>LP</th>
      <th>Data</th>
      <th>Treść</th>
      <th>Deadline</th>
      <th>Grupa</th>
      <th>Notatki</th>
      <th>Edytuj</th>
      <th>Zakończ</th>
      </tr>
      </thead> 
      @foreach($usterki as $row)
        @if($row['importance'] == '0')
      <tr>
        <td></td>
        <td style="width:85px"><a href={{"note/".$row['id_usterki']}}> {{$row['data']}}</td>
        <td class="cell-breakWord"><a href={{"note/".$row['id_usterki']}}>{{$row['tresc']}}</td>

        @if($row['deadline'] < $todayDate)
        <td><a href={{"note/".$row['id_usterki']}}><c>{{$row['deadline']}}</c></td>
        @else 
        <td><a href={{"note/".$row['id_usterki']}}>{{$row['deadline']}}</td>
        @endif

        <td class= "text-info"><a href={{"note/".$row['id_usterki']}}>{{$row['group_desc']}}</td>
        <td class= "text-info">{{$row['notki']}}</td>
        <td>
           <a href={{"edit/".$row['id_usterki']}} class="btn btn-default">Edytuj</a>
          </td>
        <td>
            <a href={{"ChangeGroup/".$row['id_usterki']}} class="btn btn-default" >Zakończ</a>
        </td>

        @else

        <tr>
        <td></td>
        <td style="width:85px"><a href={{"note/".$row['id_usterki']}}><b>{{$row['data']}}</b></td>
        <td class="cell-breakWord"><a href={{"note/".$row['id_usterki']}}><b>{{$row['tresc']}}</b></td>
       
        @if($row['deadline'] < $todayDate)
        <td><a href={{"note/".$row['id_usterki']}}><c>{{$row['deadline']}}</c></td>
        @else 
        <td><a href={{"note/".$row['id_usterki']}}>{{$row['deadline']}}</td>
        @endif

        <td class= "text-info"><a href={{"note/".$row['id_usterki']}}><b>{{$row['group_desc']}}</b></td>
        <td class= "text-info">{{$row['notki']}}</td>
        <td>
           <a href={{"edit/".$row['id_usterki']}} class="btn btn-default">Edytuj</a>
          </td>
        <td>
            <a href={{"ChangeGroup/".$row['id_usterki']}} class="btn  btn-default" >Zakończ</a>
        </td>
        @endif
        @endforeach
      </tr>
    </table>


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
