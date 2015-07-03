@extends('layouts.records')

@section('content')

	@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Success!</strong> {{ Session::get('success') }}
		</div>
	@endif

	{!! Form::model($kasus, array('class'=>'')) !!}

	<h2>Catatan Kasus</h2>

	@include('kasus.partials.form-show.action-bar')

	<div class="row">
		<div class="col-sm-6">
			@include('kasus.partials.form-show.informasi-kasus')
		</div>
		<div class="col-sm-6">
			@include('kasus.partials.form-show.bentuk-kekerasan')
		</div>
	</div>

	@include('kasus.partials.form-show.narasi')

	@include('kasus.partials.form-show.arsip')

	
	{!! Form::close() !!}
@endsection