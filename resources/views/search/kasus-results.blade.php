@extends('layouts.records')

@section('content')
	
	<h2>Hasil Pencarian</h2>
	<a href="{{ route('search.kasus') }}">Penelusuran baru</a>

	@include('search.partials.kasus-results')

@endsection
