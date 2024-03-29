@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<?php
use Carbon\Carbon;
$todayDate = Carbon::now()->format('Y-m-d');
 header('Refresh: 300'); 
 ?>

<div style="text-align: right; margin-right: 10px">
        <h6><u><a href="/profile">  @foreach($departments as $row) Zalogowany jako: {{Auth::user()->name }}, dział {{$row['departments']}} @endforeach  </a></u></h6>
    </div>
    <!-- Main content -->
    <section class="content">
      
               
         
          <script>
$(document).ready(function() {
    var t = $('#example').DataTable( {
        stateSave: true,
        stateSaveCallback: function(settings,data) {
      localStorage.setItem( 'DataTables_' + settings.sInstance, JSON.stringify(data) )
    },
  stateLoadCallback: function(settings) {
    return JSON.parse( localStorage.getItem( 'DataTables_' + settings.sInstance ) )
    },
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
            "render": function(data, type, row) {return '<button class="btn btn-primary" data-toggle="modal" data-id="'+row.id+'" data-fieldname="'+row.fieldname+'" data-target="#myModal">'+data+'</button>'} 
        } ],
        "lengthMenu": [[10, 25, 50, -1,], [10, 25, 50, "Wszystkie"]],
        "order": [[ 1, 'asc' ]],
        
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

      
    /* -> OnClick event, gdyby był potrzebny z wykorzystaniem MODALU.
    t.on('click', 'td', function () {
      
        var tresc =$(this).closest('tr').find('td:eq(2)').html();
        var id =$(this).closest('tr').find('td:eq(8)').html();
      $('#addNote').attr('action', '/addNote')
       window.$('#modal-id').modal("show");
       $(".ptresc").html("src","");
       $(".ptresc").html("<b> 1. Treść wpisu:     </b>"+tresc);

       $(".pid").html("src","");
       $(".pid").html("<b> 3. ID wpisu:     </b>"+id);
    });
    */
} );
$(document).on('click','.Back',function(){
         var id = $(this).attr('data-id');
         $('#id').val(id);
    });

    $(document).ready(function () {
 
 window.setTimeout(function() {
     $(".alert").fadeTo(500, 0).slideUp(500, function(){
         $(this).remove(); 
     });
 }, 1500);
 });
</script>

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

@if (session('failure'))
<div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            {{ session('failure') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif
<style>
a
{text-decoration: none;
 background-color: none;
 color:black; }

 .cell-breakWord {
  word-break: break-word;
 }

 c
{text-decoration: none;
 background-color: none;
 color:orange; }

</style> 

<br />  
<div class="container-xl">
    <div class="column">
        <div class="card">
            <div class="card-header">
            <div class="col-lg">
            <div class="d-inline">
        <div class="form-group mb-2" align="center">
    <h1><i class="fa fa-archive"> </i> Archiwalne- wykonane wpisy</h1>
    <p> Tabela zawiera wpisy uznane za zakończone. </p>
  </div>
</div>
</div>
</div>
<div class="card-body">

</form>
<table id="example" class="table table-striped table-bordered text-center table-hover table-responsive-lg">
<thead class="thead-dark">
            <tr >
                <th>LP</th>
                <th>Data</th>
                <th>Treść</th>
                <th>Deadline</th>
                <th>Autor</th>
                <th>Zakończył</th>
                <th>Status</th>
                <th>Zakończono</th>
                <th>Cofnij</th>
            </tr>
        </thead>
        @foreach($usterki as $row)
        
      <tr>
        <td ></td>
        <td style="width:85px"><a href={{"note/".$row['id_usterki']}}>{{$row['data']}}</td>
        <td ><a href={{"note/".$row['id_usterki']}}>{{$row['tresc']}}</td>
        <td><a href={{"note/".$row['id_usterki']}}>{{$row['deadline']}}</td>
        <td><a href={{"note/".$row['id_usterki']}}>{{$row['autor']}}</td>
        <td><a href={{"note/".$row['id_usterki']}}>{{$row['finisher']}}</td>
        <td class= "text-success" >{{$row['status']}}</td>
        <td class= "text-success" >{{$row['finished_at']}}</td>

          <td>
          <a href={{"Back/".$row['id_usterki']}} class="btn-sm btn-info">Cofnij</a>
        </td>
      </tr>

      @endforeach
      </table>

</div>
</div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- Back Warning Modal -->
          </section>
        
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
      </section>
    </section> 

</section>
    <!-- /.content -->
    @endsection
