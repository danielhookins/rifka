<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="konselor">Konselor</a>
    </h4>
  </div>

  <ul class="list-group">
    <li class="list-group-item">
        <h4 class="list-group-item-heading">Konselor</h4>
        <table class="table table-responsive table-hover">
          <tr>
            <th>Nama Konselor</th>
          </tr>
			@if (isset($konselor2) && $konselor2[0]->nama_konselor)
			<tr>
				<td>{{ $konselor2[0]->nama_konselor }}</td>
			</tr>
			@endif
        </table>
    </li>
  </ul>

	<div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-info" href="{{route('kasus.edit', array($kasus->kasus_id, 'konselor'))}}">Mengedit</a>
      <a class="btn btn-default" href="#">Kembali ke atas</a>
    </div>
  </div>

</div> <!-- / Konselor Panel -->