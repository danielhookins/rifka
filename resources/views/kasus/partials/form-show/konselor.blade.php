<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="konselor">Konselor</a>
    </h4>
  </div>

	@if (isset($konselor2) && $konselor2[0]->nama_konselor)
  <table class="table table-responsive table-hover">
  	<tr>
      <th>Nama Konselor</th>
    </tr>
    <tr>
  		<td>{{ $konselor2[0]->nama_konselor }}</td>
  	</tr>
  </table>
  
  @else
  <ul class="list-group">
    <li class="list-group-item">
      <a href="" class="tambah-link">
        Tambah Konselor
      </a>
    </li>
  </ul>

	@endif
  

	<div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-info" href="{{route('kasus.edit', array($kasus->kasus_id, 'konselor'))}}">Mengedit</a>
      <a class="btn btn-default" href="#">Kembali ke atas</a>
    </div>
  </div>

</div> <!-- / Konselor Panel -->