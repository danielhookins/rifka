@extends('layouts.records')

@section('content')
	
	<h2>Hasil Pencarian</h2>
	<a href="{{ route('search.kasus') }}">Penelusuran baru</a>
	
	<table id="datatable" class="table table-hover table-condensed">
 	<thead>
 	<tr>
 		<th># ID</th>
 		<th>Jenis Kasus</th>
 		<th>Tahun</th>
 		<th>Nama Klien</th>
 		<th>Jenis Klien</th>
 		@if(isset($data["results"][0]->no_reg))
 			<th>Arsip No.</th>
 			<th>Media</th>
 		@endif
 	</tr>
	</thead>
	<tbody>
	@forelse ($data["results"] as $result)
		<tr>
			<td>
				<a href="{{ route('kasus.show', $result->kasus_id) }}">
					<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
					&nbsp; {{ $result->kasus_id }}
				</a>
			</td>
			<td>{{ $result->jenis_kasus }}</td>
			<td>{{ $result->tahun }}</td>
			<td>
				<a href="{{ route('klien.show', $result->klien_id) }}">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					&nbsp; {{ $result->nama_klien }}
				</a>
			</td>
			<td>{{ $result->jenis_klien }}</td>
			@if(isset($result->no_reg))
				<td>{{ $result->no_reg }}</td>
				<td>{{ $result->media }}</td>
			@endif
		</tr>
		
		@empty
		<td></td>
		<th scope="row"><em>Tidak ada hasil.</em></th>
		<td colspan=3></td>
	
	@endforelse
	</tbody>
	</table>

@endsection
