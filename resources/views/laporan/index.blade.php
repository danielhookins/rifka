@extends('layouts.klien')

@section('menu')

	@include('laporan.partials.menu-list')

@endsection

@section('content')

	@if (isset($laporan))
		@include('laporan.partials.'.$laporan)
	@elseif (isset($list))
		@include('laporan.partials.list-'.$list)
	@elseif (isset($overview))
		@include('laporan.partials.overview')
	@endif

@endsection	