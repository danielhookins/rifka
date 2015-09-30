@extends('layouts.klien')

@section('menu')

	@include('laporan.partials.menu-list')

@endsection

@section('content')

	@if (isset($laporan))
		@include('laporan.partials.'.$laporan)
	@endif

@endsection	