@extends('layouts.records')

@section('content')
	
	<h2>Hasil Pencarian</h2>
	<a href="{{ route('search.konselor') }}">Penelusuran baru</a>

	@include('search.partials.konselor-results')

@endsection
