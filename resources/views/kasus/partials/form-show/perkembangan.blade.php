<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="perkembangan">Perkembangan</a>
    </h4>
  </div>
  
  @if(isset($kasus->perkembangan))
  <table class="table table-responsive table-hover">
    <tr>
      <th>Tanggal</th>
      <th>Intervensi</th>
      <th>Kesimpulan</th>
      <th>Kesepakatan</th>
    </tr>
  
    @foreach ($kasus->perkembangan as $perkembangan)
    <input type="hidden" name="perkembangan_id" value="{{$perkambangan->perkembangan_id}}">
    <input type="hidden" name="kasus_id" value="{{$perkambangan->kasus_id}}">
    <tr>
      <td>{{ $perkembangan->tanggal }}</td>
      <td>{{ $perkembangan->intervensi }}</td>
      <td>{{ $perkembangan->kesimpulan }}</td>
      <td>{{ $perkembangan->kesepakatan }}</td>
    </tr>   
    @endforeach
  
  </table>
  
  <div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-default" href="{{route('kasus.edit', array($kasus->kasus_id, 'perkembangan'))}}">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        Edit
      </a>
    </div>
  </div>


  @else
  <ul class="list-group">
    <li class="list-group-item">
      <a class="tambah-link" href="{{route('kasus.edit', array($kasus->kasus_id, 'perkembangan'))}}">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
      Tambah Perkembangan
      </a>
    </li>
  </ul>
  @endif

</div> <!-- / Perkembangan Panel -->