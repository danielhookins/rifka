<h3>Search Results</h3>
<p>Search for "{{ Session::get('query') }}" found {{ Session::get('results')->count() }} results</p>
<p><strong>Please select client to add to case:</strong></p>
<table class="table table-hover">
	<tr>
		<th># ID</th>
		<th>Nama</th>
		<th>Telp</th>
		<th>Alamat</th>
		<th>Email</th>
	</tr>
@forelse (Session::get('results') as $result)
	<tr>
		<td><a href="{{ route('seshPushKlien', $result->klien_id) }}/{{ $type }}">{!! $result->klien_id !!}</a></td>
		<td><a href="{{ route('seshPushKlien', $result->klien_id) }}/{{ $type }}">{!! $result->nama_klien !!}</a></td>
		<td>{!! $result->no_telp !!}</td>
		<td>
			<ul>
				@forelse ($result->alamatKlien()->get() as $resultAlamat)
					{{ $resultAlamat->alamat }}
					@if ($resultAlamat->kecamatan)
						<br />{{ $resultAlamat->kecamatan }}
					@endif
					@if ($resultAlamat->kabupaten)
						<br />{{ $resultAlamat->kabupaten }}
					@endif
				@empty
					<li></li>
				@endforelse
			</ul>
		</td>
		<td>{!! $result->email !!}</td>
	</tr>
	@empty
	<td></td>
	<th scope="row"><em>Tidak ada hasil.</em></th>
	<td colspan=3></td>
@endforelse
</table>