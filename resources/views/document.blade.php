<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<div class="row">
  <div class="column">
  <div id = "tabela_wplat">
  <table style="width: 100%; display: table; table-layout: fixed;" class="table table-striped table-bordered text-center table-hover table-responsive">
      <tr>
        <th>Id</th>
        <th>Numer wplaty</th>
        <th>Data</th>
        <th>Tresc</th>
        <th>Kwota przychodu</th>
      </tr>
      @foreach($wplata as $row)
      <tr>
        <td>{{$row['id']}}</td>
        <td>{{$row['numer_wplaty']}}</td>
        <td>{{$row['data']}}</td>
        <td>{{$row['tresc']}}</td>
        <td>{{$row['kwota_przychodu']}}</td>
      </tr>
      @endforeach
      <tr>
        
    </table>
  </div>
  </div>
  <div class="column">
  <table style="width: 100%; display: table; table-layout: fixed;" class="table table-striped table-bordered text-center table-hover table-responsive">
      <tr>
        <th>Id</th>
        <th>Numer wyplaty</th>
        <th>Data</th>
        <th>Tresc</th>
        <th>Kwota rozchodu</th>
      </tr>
      @foreach($wyplata as $row)
      <tr>
          <td>{{$row['id']}}</td>
          <td>{{$row['numer_wyplaty']}}</td>
          <td>{{$row['data']}}</td>
          <td>{{$row['tresc']}}</td>
          <td>{{$row['kwota_rozchodu']}}</td>
         
      </tr>
      @endforeach
    </table>