@extends('layouts.records')

@section('content')

	<h2>Konselor</h2>

	<ul>
		<li><strong>Konselor ID:</strong> {{ $konselor->konselor_id or ''}}</li>
		<li><strong>Nama Konselor:</strong> {{ $konselor->nama_konselor or ''}}</li>
		<li><strong>User ID:</strong> {{ $konselor->user_id or ''}}</li>
	</ul>

	<a class="btn btn-default" href="{{ route('konselor.index') }}">
		Index
	</a>

	<a class="btn btn-default" href="{{ route('konselor.edit', $konselor->konselor_id) }}">
		Edit
	</a>

@endsection