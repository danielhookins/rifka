<div class="panel panel-default">

<div class="panel-heading">
  <h4 class="panel-title">
    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
    &nbsp;
    Kasus Konselor
  </h4>
</div>

<table id="datatable" class="table table-responsive table-hover">
<thead>
	<tr>
		<th>Kasus ID</th>
		<th>Jenis</th>
		<th>Klien</th>
		<th>Tanggal Dibuka</th>
		<th></th>
	</tr>
</thead>
<tbody>
	@forelse($cases as $case)
		<tr>	
			<td>
				<a href="{{ route('kasus.show', $case->kasus_id) }}">
					{{ $case->kasus_id }}
				</a>
			</td>
			<td>{{ $case->jenis_kasus }}</td>
			<td>
				<ul>
				@forelse($case->klienKasus()->get() as $klien)
					<li>
						<a href="{{ route('klien.show', $klien->klien_id) }}">
							{{ $klien->nama_klien }}
						</a>
					</li>
				@empty
				@endforelse
				</ul>
			</td>
			<td>{{ $case->created_at }}</td>
  		<td></td>
		</tr>
	@empty
		<tr>
			<td colspan="5">Belum ada kasus</td>
		</tr>
	@endforelse
</tbody>
</table>

</div>