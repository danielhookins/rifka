@extends('layouts.records')

@section('content')
	<h2>Search Results</h2>
	<p>Search for "{{ $query }}" showing {{ $results->count() }} results</p>
	
	<table class="table table-responsive table-hover">
 	<tr>
 		<th># Kasus</th>
 		<th class="hidden-xs">Jenis Kasus</th>
 		<th>Klien</th>
 		<th>Arsip</th>
 		<th class="hidden-xs">Tgl. Created</th>
 	</tr>
	@forelse ($results as $result)
		<tr>
			<td><a href="{!! route('kasus.index') !!}/{{ $result->kasus_id }}">{!! $result->kasus_id !!}</a></td>
			<td class="hidden-xs">{!! $result->jenis_kasus !!}</td>
			<td>
				<ul>
					@forelse ($result->klienKasus()->get() as $klienKasus)
						<li><a href="{!! route('klien.index') !!}/{{ $klienKasus->klien_id }}">{{ $klienKasus->nama_klien }}</li>
					@empty
						<li>Tidak ada klien.</li>
					@endforelse
				</ul>
			</td>
			<td>
				<ul>
					@foreach ($result->arsip()->get() as $arsip)
						<li>{{ $arsip->no_reg }}</li>
					@endforeach
				</ul>
			</td>
			<td class="hidden-xs">
				{{ $result->created_at }}
			</td>
		</tr>
		@empty
		<td></td>
		<th scope="row"><em>Tidak ada hasil.</em></th>
		<td colspan=3></td>
	@endforelse
	</table>

@endsection