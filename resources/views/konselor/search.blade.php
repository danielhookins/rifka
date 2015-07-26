@extends('layouts.records')

@section('content')

<h2>Search Results</h2>

<ul>
	@forelse ($results as $result)
	<li>
		<a href="{{route('konselor.show', $result->konselor_id)}}">
			{{$result->nama_konselor}}
		</a>
	</li>
	
	@empty
	<li>None found.</li>

	@endforelse
</ul>

@endsection