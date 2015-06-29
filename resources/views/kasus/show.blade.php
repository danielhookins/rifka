@extends('layouts.records')

@section('content')

	@if(Session::has('success'))
	    <div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Success!</strong> {{ Session::get('success') }}
		</div>
	@endif

	<h2>Catatan Kasus</h2>

	@include('kasus.partials.form-show.action-bar')

	@include('kasus.partials.form-show.informasi-kasus')

	@include('kasus.partials.form-show.narasi')

	@include('kasus.partials.form-show.arsip')

@endsection