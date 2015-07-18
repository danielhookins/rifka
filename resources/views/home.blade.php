@extends('layouts.records')

@section('content')

	@if(Session::has('success'))
	  <div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  	<span aria-hidden="true">&times;</span>
		  </button>
		  <strong>Success!</strong> {{ Session::get('success') }}
		</div>
	@endif

	<div class="row">
		<div class="col-xs-12 col-sm-6 col-sm-offset-3">
			@include('partials.search')
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-3 col-sm-offset-3">
			@include('klien.partials.new')
		</div>
		<div class="col-xs-12 col-sm-3">
			@include('kasus.partials.new')
		</div>
	</div>

@endsection