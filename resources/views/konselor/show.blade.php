@extends('layouts.records')

@section('content')

@if(Session::has('konselorMsgs'))
	<div class="alert alert-info alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	  <strong>Perhatian</strong>
	  <ul>
		  @foreach(Session::get('konselorMsgs') as $msg) 
		  	<li>{{ $msg }}</li>
		  @endforeach
	  </ul>
	</div>
@endif

	<h2>Konselor</h2>

	<ul>
		<li><strong>Konselor ID:</strong> {{ $konselor->konselor_id or ''}}</li>
		<li><strong>Nama Konselor:</strong> {{ $konselor->nama_konselor or ''}}</li>
		<li><strong>User ID:</strong> {{ $konselor->user_id or ''}}</li>
	</ul>

	<a class="btn btn-default" href="{{ route('konselor.index') }}">
		Daftar
	</a>

	<a class="btn btn-default" href="{{ route('konselor.edit', $konselor->konselor_id) }}">
		Edit
	</a>

@endsection