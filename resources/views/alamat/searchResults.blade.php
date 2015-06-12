@extends('layouts.records')

@section('content')
	<h2>Search Results</h2>
	<p>Search for "{{ $query }}" found {{ $results->count() }} results</p>
	<table class="table table-hover">
 	<tr>
 		<th>Alamat</th>
 		<th>Kecamatan</th>
 		<th>Kabupaten</th>
 		<th>Klien</th>
 	</tr>
	@forelse ($results as $result)
		<tr>
			<td>{{ $result->alamat }}</td>
			<td>{{ $result->kecamatan }}</td>
			<td>{{ $result->kabupaten }}</td>
			<td>
				<ul>
					@forelse ($result->alamatKlien()->get() as $resultKlien)
						<li><a href="{{ route('klien.index') }}/{{ $resultKlien->klien_id }}">{{ $resultKlien->nama_klien }}</a></li>
					@empty
						<li>Tidak ada klien.</li>
					@endforelse
				</ul>
			</td>
		</tr>
		@empty
		<td></td>
		<th scope="row"><em>Tidak ada hasil.</em></th>
		<td colspan=3></td>
	@endforelse
	</table>

@endsection