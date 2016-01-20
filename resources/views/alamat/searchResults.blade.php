@extends('layouts.records')

@section('content')
	
	<h2>Hasil Pencarian</h2>
	<p>Menampilkan {{ $results->count() }} hasil untuk "{{ $query }}"</p>
	
	<table id="datatable" class="table table-hover table-condensed">
 	<thead>
 	<tr>
 		<th class="hidden-xs"># ID</th>
 		<th>Nama</th>
 		<th>Kabupaten</th>
 		<th>Kecamatan</th>
 		<th class="hidden-xs">Alamat</th>
 		<th class="hidden-xs">Email</th>
 	</tr>
	</thead>
	<tbody>
	@forelse ($results as $result)
		<tr>
			<td class="hidden-xs"><a href="{{ route('klien.index') }}/{{ $result->klien_id }}">{!! $result->klien_id !!}</a></td>
			<td>
				<a href="{{ route('klien.index') }}/{{ $result->klien_id }}">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					&nbsp;
					{!! $result->klien->nama_klien !!}
				</a>
			</td>
			<td>{!! $result->kabupaten !!}</td>
			<td>{!! $result->kecamatan !!}</td>
			<td class="hidden-xs">{!! $result->alamat !!}</td>
			<td class="hidden-xs"><a href="mailto:{!! $result->email !!}">{!! $result->email !!}</a></td>
		</tr>
		
		@empty
		<td></td>
		<th scope="row"><em>Tidak ada hasil.</em></th>
		<td colspan=3></td>
	
	@endforelse
	</tbody>
	</table>

@endsection
