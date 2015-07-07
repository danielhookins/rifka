<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="layanan-dibutuhkan">Layanan Dibutuhkan</a>
    </h4>
  </div>

  <ul class="list-group">
    <li class="list-group-item">
        <h4 class="list-group-item-heading">Layanan Dibutuhkan</h4>
        <table class="table table-responsive table-hover">
          <tr>
            <th>Jenis Layanan</th>
            <th>Status</th>  
          </tr>

          @forelse ($kasus->layananDibutuhkan as $layanan)
          <input type="hidden" name="layanan_dbth_id" value="{{$layanan->layanan_dbth_id}}">
          <input type="hidden" name="kasus_id" value="{{$layanan->kasus_id}}">
          <tr>
            <td>{{ $layanan->jenis_layanan }}</td>
            <td>{{ $layanan->status }}</td>
          </tr>
        
          @empty
            belum ada

          @endforelse
        </table>
    </li>
  </ul>

	<div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-info" href="{{route('kasus.edit', array($kasus->kasus_id, 'layanan-dibutuhkan'))}}">Mengedit</a>
      <a class="btn btn-default" href="#">Kembali ke atas</a>
    </div>
  </div>

</div> <!-- / Layanan Dibutuhkan Panel -->