@extends('layouts.records')

@section('content')
	
	@if(isset($data["referPage"]))

		<h2>Tambah Klien</h2>
		<h3>Hasil Pencarian</h3>
		<p>Menampilkan {{ sizeof($data["results"]) }}</p>

		@if(!empty($data["results"]))
			<p>Tolong pilih klien.</p>
		@endif
		
		@include('search.partials.klien-results-add-case')

	@else

		<h2>Hasil Pencarian</h2>
		<a href="{{ route('search.klien') }}">Penelusuran baru</a>

		@include('search.partials.klien-results')

	@endif

@endsection
