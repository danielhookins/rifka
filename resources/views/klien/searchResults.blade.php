@extends('layouts.records')

@section('content')
	
	<h2>Hasil Pencarian</h2>
	<p>Menampilkan {{ $results->count() }} hasil untuk "{{ $query }}"</p>
	
	<table id="datatable" class="table table-hover table-condensed">
 	<thead>
 	<tr>
 		<th class="hidden-xs"># ID</th>
 		<th>Nama</th>
 		<th class="hidden-xs">Telp</th>
 		<th>Alamat</th>
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
					{!! $result->nama_klien !!}
				</a>
			</td>
			<td class="hidden-xs">{!! $result->no_telp !!}</td>
			<td>
				<ul>
					@forelse ($result->alamatKlien as $resultAlamat)
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
