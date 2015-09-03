@extends('layouts.records')

@section('content')

	@if(!empty($inactive->toArray()))
		@include('user.partials.inactive')
	@endif

	@include('user.partials.list')

@endsection