<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="dampak">Dampak</a>
    </h4>
  </div>

  @if(isset($kasus->dampak))
    <table class="table table-responsive table-hover">
      <tr>
        <th>Jenis Dampak</th>
        <th>Keterangan</th>  
      </tr>

      @foreach ($kasus->dampak as $dampak)
      <input type="hidden" name="dampak_id" value="{{$dampak->dampak_id}}">
      <input type="hidden" name="kasus_id" value="{{$dampak->kasus_id}}">
      <tr>
        <td>{{ $dampak->jenis_dampak }}</td>
        <td>{{ $dampak->keterangan}}</td>
      </tr>
      @endforeach
    
    </table>

    <div class="panel-body">
      <div class="form-inline">
        <a class="btn btn-default" href="{{route('kasus.edit', array($kasus->kasus_id, 'dampak'))}}">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          Edit
        </a>
      </div>
    </div>

  @else
    <ul class="list-group">
      <li class="list-group-item">
        <a class="tambah-link" href="{{route('kasus.edit', array($kasus->kasus_id, 'dampak'))}}">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Dampak
        </a>
      </li>
    </ul>

  @endif

</div> <!-- / Dampak Panel -->