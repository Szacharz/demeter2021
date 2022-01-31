@extends('layouts.admin') 

   

@section('content')
<div style="text-align: right; margin-right: 10px; margin-top: 3px">
    <u style="margin-left: 15px">  <a href="/profile">  @foreach($departments as $row) Zalogowany jako: {{Auth::user()->name }}, dział {{$row['departments']}} @endforeach  </a> </u></h6>
  </div>
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
$(document).ready(function () {
 
 window.setTimeout(function() {
     $(".alert").fadeTo(500, 0).slideUp(500, function(){
         $(this).remove(); 
     });
 }, 1500);
 });
</script>

<style>
    .cell-breakWord {
      word-break: break-word;
     }
     .container {overflow: auto;}
    </style>
    
 @if(Auth::user()->department_id == $usterki['department_id'])

    <!-- Main content -->
<section class="content">
    <div class="container"> 
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
        <div class="card">
            <!-- Form -->
            @if(count($errors)>0)
                <ul>
                @foreach($errors->all() as $error)
                <li class="alert alert-danger">{{$error}}</li>
                @endforeach
                </ul>
            @endif
            
            <form  enctype="multipart/form-data" action="/notesubmit" method="POST" accept-charset="utf-8">
                @csrf
                <input type="hidden" name="id_usterki" id="id_usterki" value="{{$usterki['id_usterki']}}">
            
        
                <div class="form-group mb-2">
                    <div class="p-3 mb-2 bg-dark text-white">
                        <div class="card-header cell-breakWord" align="center"><h1 >Tytuł wpisu: </h1> <h5><b>{{$usterki['tresc']}}</b></h5></div>
                    </div>
                </div>

              
                <div class="card-body">
                    @if($usterki['updated_by'] != null) 
                    <div class="center">
                    <table id="updateInfo" name="updateInfo" class="table-danger table-striped table-bordered text-center table-hover table-responsive-lg" style="width: 100%" >
                        <thead class="thead-info">
                            <tr>                          
                                <th colspan="2">Wpis był edytowany</th>
                            </tr>
                        </thead>
                        <td>  Edytował: <b>{{$usterki['updated_by']}}<b> </td>
                        <td>  Dnia: <b>{{$usterki['updated_at']}}<b>  </td>
                         
                    </table>
                </div>
                    <hr>
                    <br>
                @endif

                    <div class="form-group">
                        <label for="tresc">Informacje:</label>   
                        <p class="card-text">  <b>1.</b> Karta Wpisu o <b>ID: {{$usterki['id_usterki']}}</b>   &nbsp&nbsp&nbsp&nbsp   <b> 2.</b> Autor wpisu:<b> {{$usterki['autor']}} </b> &nbsp&nbsp&nbsp&nbsp  <b> 3.</b> Status:<b> {{$usterki['status']}} </b> &nbsp&nbsp&nbsp&nbsp  <b> 4.</b> Grupa:<b> {{$usterki['group_desc']}}  </b>      &nbsp&nbsp&nbsp&nbsp  <b> 5.</b> Deadline:<b> {{$usterki['deadline']}}  </b>      <a  style="float: right" href={{url("edit/{$usterki['id_usterki']}") }} class="btn  btn-info">Edytuj kartę wpisu</a> </p>
        
                    </div>
                    <div class="form-group">
                    <p class="card-text"> <b> 4.</b> Tabela notatek:</p> 
                    </div>
             
                    <table id="Notki" name="Notki" class="table table-striped table-bordered text-center table-hover table-responsive-lg" >
                        <thead class="thead-dark">
                            <tr>
                                <th>LP</th>
                                <th>Data</th>
                                <th>Treść</th>
                                <th>Autor</th>
                                <th>Opcje</th>
                            </tr>
                        </thead>
                            @foreach($notatki as $row)
                        <tr>
                            <td></td>
                            <td style="width:85px">{{$row['created_at']}}</td>
                            <td class="cell-breakWord">{{$row['tresc_nt']}}</td>
                            <td>{{$row['autor']}}</td>
                            <td><a href={{url('editnote/' .$usterki['id_usterki'] . '/' . $row['id_notatki'])}}><i class="fa fa-pencil-square" aria-hidden="true"></i></a>  
                            @if($row['img_code']!= null)
                                <a><i class="fa fa-picture-o" aria-hidden="true" data-toggle="modal" data-target="#yourModal{{$row['id_notatki']}}"></i></a>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>     
                    
                    <br>
                    <hr>
                    <h3>Dodawanie nowej notatki</h3>
                    <p> Dodaj nową notatkę, uzupełniając formularz. Dodatkowo możesz załączyć zdjęcie/zrzut ekranu. Potem Kliknij "Dodaj notatkę".  </p>
                    <!-- Input fields -->
                    <div class="form-group">
                        <label for="tresc_nt">Treść notatki</label>
                        <textarea height="100%" class="form-control" name="tresc_nt" id="tresc_nt" placeholder="Wprowadź tekst notatki"></textarea>
                    </div>
                    <input type="hidden" name="autor" id="autor" value="{{Auth::user()->name }}">
                    <input type="hidden" name="notki" id="notki" value="TAK">


                    <div class="form-group">
                     
                        <label for="photo">Dodaj zdjęcie (opcjonalne):  </label>  <br>
                            <input type="file"  name="photo" id="photo" accept="image.png, image/jpeg" aria-describedby="fileHelp">
                            {{-- Przycisk dt ładowania obrazku --}}       
                            <small id="fileHelp" class="form-text text-muted">Dodaj zdjęcie do swojej notatki. Rozmiar zdjęcia nie może przekraczać 2MB.</small>
                           
                        </div>

                    <p align="right">               
                    <button type="submit" class="btn btn-primary">Dodaj notatkę</button> 
                    </p>
                    <!-- End input fields -->
                </div>   
                  <!-- /.card-body -->
            </form>
            <!-- Form end -->

            <!--Modal (okno wyskakujące)-->
            @foreach ($notatki as $row)
            <div class="modal fade" id="yourModal{{$row['id_notatki']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                        <center>
                        <img class="img-responsive" src="data:image/jpeg;base64,{{$row['img_code']}}" style="max-width:750px;" >  </center>
                    </div>
                   
                  </div>
                </div>
              </div>
         <!--Modal (koniec okno wyskakujące)-->
            @endforeach
                            @else
                                    <br> <br>
                                                <div class="container-xl">
                                                <div class="col-lg my-auto">

                                    <div class="card text-white bg-danger">
                                    <div class="card-header"><h1><i class="fa fa-shield"></i> Edycja Notatki </h1></div>
                                    <div class="card-body">
                                        <h5 class="card-title" align="center"> Brak Dostępu. </h5>
                                        <p class="card-text">  Do tej części strony dostęp ma tylko użytkownik należący do odpowiedniego działu. </p>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    <br> </br>
                            @endif         


                        
          
            <!-- /.card -->
        </div>
    </div>
</section>    
    <!-- /.content -->
@endsection