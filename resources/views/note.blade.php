@extends('layouts.admin')

<head>
<link rel = "icon" href = "https://www.vhv.rs/dpng/d/539-5398503_transparent-dementor-png-silhouette-harry-potter-dementor-png.png"  type = "image/x-icon">
</head>


@section('content')
<!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
    <script>
$(document).ready(function() {
    var t = $('#Notki').DataTable( {
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

      // Próba dt edycji row z js 
  // $("#Notki").on('mousedown.edit', "i.fa.fa-pencil-square", function(e) {

  //   $(this).removeClass().addClass("fa fa-envelope-o");
  //   var $row = $(this).closest("tr").off("mousedown");
  //   var $tds = $row.find("td").not(':first').not(':last');

  //   $.each($tds, function(i, el) {
  //   var txt = $(this).text();
  //   $(this).html("").append("<input type='text' value=\""+txt+"\">");
  //   });

  // });
  // $("#Notki").on('mousedown', "input", function(e) {
  //       e.stopPropagation();
  //     });

  //     $("#Notki").on('mousedown.save', "i.fa.fa-envelope-o", function(e) {
        
  //       $(this).removeClass().addClass("fa fa-pencil-square");
  //       var $row = $(this).closest("tr");
  //       var $tds = $row.find("td").not(':first').not(':last');
        
  //       $.each($tds, function(i, el) {
  //         var txt = $(this).find("input").val()
  //         $(this).html(txt);
  //       });
  //     });
      
</script>

<style>
.cell-breakWord {
  word-break: break-word;
 }
 .container {overflow: auto;}
</style>


           
<br>
<div class="container">
        <div class="row justify-content-center align-items-center">
        <div class="col-sm-8">
          <div class="card">
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
           <div class="card-header cell-breakWord" align="center"><h1 >Tytuł wpisu: </h1> <h5><b>{{$usterki['tresc']}}</b></h5> </div>
           </div>
            <div class="card-body">
            <div class="form-group">
                    <label for="tresc">Informacje:</label>
                </div>
                <p class="card-text">  <b>1.</b> Karta Wpisu o <b>ID: {{$usterki['id_usterki']}}</b>   &nbsp&nbsp&nbsp&nbsp   <b> 2.</b> Autor wpisu:<b> {{$usterki['autor']}} </b> &nbsp&nbsp&nbsp&nbsp  <b> 3.</b> Status:<b> {{$usterki['status']}} </b> </p>
     
                
                <p class="card-text"> <b> 4.</b> Tabela notatek:</p> 
                
                <form class="center" >
              <table id="Notki" class="table table-striped table-bordered text-center table-hover table-responsive-lg">
              <thead class="thead-dark">
            <tr>
                <th>LP</th>
                <th class="cell-breakWord">Treść</th>
                <th>Autor</th>
                <th>Edycja</th>
            </tr>
        </thead>
        @foreach($notatki as $row)
   </div>  
      <tr>
        <td></td>
        <td>{{$row['tresc_nt']}}</td>
        <td>{{$row['autor']}}</td>
        <td><a href={{"editnote/".$row['id_notatki']}}><i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
        
      </tr>
      @endforeach
      </table>
                    <div>
                    </div>
                    <br>
                    </br>
                <h3>Dodawanie nowej notatki</h3>
                <p> Dodaj nową notatkę, uzupełniając formularz. Potem Kliknij "Dodaj notatkę".</p>
                <!-- Input fields -->
                <div class="form-group">
                    <label for="tresc_nt">Treść notatki</label>
                    <textarea height="100%" class="form-control" name="tresc_nt" id="tresc_nt" placeholder="Wprowadź tekst notatki"></textarea>
                </div>
                <input type="hidden" name="autor" id="autor" value="{{Auth::user()->name }}">
                <input type="hidden" name="notki" id="notki" value="TAK">
                <p align="right">               
                 <button type="submit" class="btn btn-primary">Dodaj notatkę</button>
                </p>
                <!-- End input fields -->
                </form>
                </div>
                </div>
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