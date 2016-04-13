@extends('layouts.laporan')

@section('content')

	<h2>Laporan</h2>
	<h4>{{ $jenisKlien }}</h4>
	<p>Laporan {!! implode(", ", array_keys($data["selected"])) !!} untuk tahun {{ $data["tahun"] }}.</p>
	<p>
		<a href="{{ route('laporan.index') }}">Membuat Laporan Baru</a>
	</p>

	@include('laporan.partials.table')

	@if($groupBy != "semua" && $data["rows"]->count() < 15)
		@include('laporan.partials.chart-barchart')
	@endif
	

@endsection	