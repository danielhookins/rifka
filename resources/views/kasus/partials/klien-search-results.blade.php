<h3>Hasil Pencarian</h3>
<p>Menampilkan {{ sizeof($results) }}</p>

@if(!empty($results))
	<p><strong>Silahkan pilih klien:</strong></p>
@endif

<table class="table table-hover">
	<thead>
		<tr>
			<th># ID</th>
			<th>Nama</th>
		</tr>
	</thead>
	<tbody>
		@forelse ($results as $result) 
			<tr>
				<td>
					{{ $result->klien_id }}
				</td>
				<td>
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					&nbsp; {{ $result->nama_klien }}
				</td>
			</tr>
		@empty
			<td scope="row">
				Tidak ada hasil. Mau <a href="{{ route('klien.create') }}" target="_blank">tambah klien baru</a>? (Buka jendela baru)
			</td>
			<td colspan=4></td>
		@endforelse
	</tbody>
</table>