<?php $data = Session::get('data'); ?>
<table id="datatable" class="table table-hover table-condensed">
 	<thead>
 	<tr>
 		<th># ID</th>
 		<th>Nama</th>
 	</tr>
	</thead>
	<tbody>
	@forelse ($data["results"] as $result)
		<tr>
			<td>
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				&nbsp; {{ $result->konselor_id }}
			</td>
			<td>
				<a href="{{ route('tambah.kasus.konselor', array($kasus->kasus_id, $result->konselor_id)) }}">
					{{ $result->nama_konselor }}
				</a>
			</td>
		</tr>
		
		@empty
		<td></td>
		<th scope="row"><em>Tidak ada hasil.</em></th>
		<td colspan=2></td>
	
	@endforelse
	</tbody>
</table>