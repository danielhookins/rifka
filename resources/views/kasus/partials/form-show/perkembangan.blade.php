<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="perkembangan">Perkembangan</a>
    </h4>
  </div>
  
  <ul class="list-group">
    <li class="list-group-item">
        <h4 class="list-group-item-heading">Perkembangan</h4>
        <table class="table table-responsive table-hover">
          <tr>
            <th>Tanggal</th>
            <th>Intervensi</th>
            <th>Kesimpulan</th>
            <th>Kesepakatan</th>
          </tr>

          @forelse ($kasus->perkembangan as $perkembangan)
          <input type="hidden" name="perkembangan_id" value="{{$perkambangan->perkembangan_id}}">
          <input type="hidden" name="kasus_id" value="{{$perkambangan->kasus_id}}">
          <tr>
            <td>{{ $perkembangan->tanggal }}</td>
            <td>{{ $perkembangan->intervensi }}</td>
            <td>{{ $perkembangan->kesimpulan }}</td>
            <td>{{ $perkembangan->kesepakatan }}</td>
          </tr>
        
          @empty
            belum ada

          @endforelse
        </table>
    </li>
  </ul>

	<div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-info" href="{{route('kasus.edit', array($kasus->kasus_id, 'perkembangan'))}}">Mengedit</a>
      <a class="btn btn-default" href="#">Kembali ke atas</a>
    </div>
  </div>

</div> <!-- / Perkembangan Panel -->