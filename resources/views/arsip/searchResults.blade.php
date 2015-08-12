@extends('layouts.records')

@section('content')
	<h2>Search Results</h2>
	<p>Search for "{{ $query }}" showing {{ $results->count() }} results</p>
	
	<table class="table table-hover">
 	<tr>
 		<th>No Reg</th>
 		<th>Media</th>
 		<th>Lokasi</th>
 		<th>Kasus</th>
 		<th>Jenis Kasus</th>
 	</tr>
	@forelse ($results as $result)
		<tr>
			<td>
					{!! $result->no_reg !!}
			</td>
			<td>
					{!! $result->media !!}
			</td>
			<td>
					{!! $result->lokasi !!}
			</td>
			
			@foreach ($result->kasus()->get() as $arsipKasus)
				<td>
					<a  href="{!! route('kasus.index') !!}/{{ $arsipKasus->kasus_id }}"> 
						<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
						&nbsp;
						{{ $arsipKasus->kasus_id }}
					</a>
				</td>
				<td>
						{{ $arsipKasus->jenis_kasus}}
				</td>
			@endforeach
		
		</tr>
		@empty
		<td></td>
		<th scope="row"><em>Tidak ada hasil.</em></th>
		<td colspan=4></td>
	
	@endforelse
	</table>

@endsection