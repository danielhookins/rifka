@extends('layouts.records')

@section('content')
	<h2>Search Results</h2>
	<p>Search for "{{ $query }}" showing {{ $results->count() }} results</p>
	
	<table class="table table-hover">
 	<tr>
 		<th>No Reg</th>
 		<th>Lokasi</th>
 		<th>Kasus</th>
 		<th>Jenis Kasus</th>
 	</tr>
	@forelse ($results as $result)
		<tr>
			<td>{!! $result->no_reg !!}</td>
			<td>{!! $result->lokasi !!}</a></td>
			@foreach ($result->kasus()->get() as $arsipKasus)
				<td><a href="{!! route('kasus.index') !!}/{{ $arsipKasus->kasus_id }}">{{ $arsipKasus->kasus_id }}</td>
				<td>{{ $arsipKasus->jenis_kasus}}</td>
			@endforeach
		</tr>
		@empty
		<td></td>
		<th scope="row"><em>Tidak ada hasil.</em></th>
		<td colspan=3></td>
	@endforelse
	</table>

@endsection