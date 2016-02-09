@extends('layouts.records')

@section('content')
	
	<h2>Hasil Pencarian</h2>
	<a href="{{ route('search.klien') }}">Penelusuran baru</a>
	
	<table id="datatable" class="table table-hover table-condensed">
 	<thead>
 	<tr>
 		<th># ID</th>
 		<th>Nama</th>
 		<th>Kelamin</th>
 		<th>E-mail</th>
 		<th>No Telp</th>
 		@if(isset($results[0]->kabupaten))
 			<th>Kabupaten</th>
 			<th>Kecamatan</th>
 		@endif
 	</tr>
	</thead>
	<tbody>
	@forelse ($results as $result)
		<tr>
			<td>
				<a href="{{ route('klien.show', $result->klien_id) }}">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					&nbsp; {{ $result->klien_id }}
				</a>
			</td>
			<td>
				<a href="{{ route('klien.show', $result->klien_id) }}">
					{{ $result->nama_klien }}
				</a>
			</td>
			<td>{{ $result->kelamin }}</td>
			<td>{{ $result->email }}</td>
			<td>{{ $result->no_telp }}</td>
			@if(isset($result->kabupaten))
				<td>{{ $result->kabupaten }}</td>
				<td>{{ $result->kecamatan }}</td>
			@endif
		</tr>
		
		@empty
		<td></td>
		<th scope="row"><em>Tidak ada hasil.</em></th>
		<td colspan=2></td>
	
	@endforelse
	</tbody>
	</table>

@endsection
