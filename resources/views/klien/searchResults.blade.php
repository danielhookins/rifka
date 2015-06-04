@extends('layouts.records')

@section('content')
	<h2>Search Results</h2>
	<p>Search for "{{ $query }}" found {{ $results->count() }} results</p>
	<table class="table table-hover">
 	<tr>
 		<th># ID</th>
 		<th>Nama</th>
 		<th>Email</th>
 		<th>Telp</th>
 		<th>Alamat</th>
 	</tr>
	@forelse ($results as $result)
		<tr>
			<td><a href="{{ $result->klien_id }}">{!! $result->klien_id !!}</a></td>
			<td><a href="{{ $result->klien_id }}">{!! $result->nama_klien !!}</a></td>
			<td>{!! $result->email !!}</td>
			<td>{!! $result->no_telp !!}</td>
			<td>
				<ul>
					@forelse ($result->alamatKlien()->get() as $resultAlamat)
						{{ $resultAlamat->alamat }}
						@if ($resultAlamat->kecematan)
							<br />{{ $resultAlamat->kecematan }}
						@endif
						@if ($resultAlamat->kabupaten)
							<br />{{ $resultAlamat->kabupaten }}
						@endif
					@empty
						<li></li>
					@endforelse
				</ul>
			</td>
		</tr>
		@empty
		<td></td>
		<th scope="row"><em>Tidak ada result.</em></th>
		<td colspan=3></td>
	@endforelse
	</table>

@endsection