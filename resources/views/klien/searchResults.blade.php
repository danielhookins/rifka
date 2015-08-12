@extends('layouts.records')

@section('content')
	
	<h2>Search Results</h2>
	<p>Search for "{{ $query }}" found {{ $results->count() }} results</p>
	
	<table class="table table-responsive table-hover">
 	<tr>
 		<th class="hidden-xs"># ID</th>
 		<th>Nama</th>
 		<th class="hidden-xs">Telp</th>
 		<th>Alamat</th>
 		<th class="hidden-xs">Email</th>
 	</tr>
	
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
					@forelse ($result->alamat as $resultAlamat)
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
	
	</table>

@endsection
