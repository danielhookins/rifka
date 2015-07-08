@extends('layouts.kasus')

@section('menu')

	@include('kasus.partials.menu.menu-options')
	@include('kasus.partials.menu.menu-show')

@endsection

@section('content')

	@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Success!</strong> {{ Session::get('success') }}
		</div>
	@endif

	{!! Form::model($kasus, array('class'=>'')) !!}
	
		<div class="row">
			<div class="col-sm-8">
				@include('kasus.partials.form-show.informasi-kasus')
			</div>
			<div class="col-sm-4">
				@include('kasus.partials.form-show.klien-kasus')
			</div>
		</div>

		@include('kasus.partials.form-show.konselor')
		@include('kasus.partials.form-show.narasi')
		@include('kasus.partials.form-show.perkembangan')
		
		<h3>Arsip</h3>
		@include('kasus.partials.form-show.arsip')

		<h3>Keterangan</h3>
		@include('kasus.partials.form-show.bentuk-kekerasan')
		@include('kasus.partials.form-show.faktor-pemicu')
		@include('kasus.partials.form-show.layanan-dibutuhkan')

	{!! Form::close() !!}

@endsection