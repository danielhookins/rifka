@extends('layouts.kasus')

@section('menu')

		<div class="visible-xs">
			@include('kasus.partials.menu.mobile-box')
		</div>
		@include('kasus.partials.menu.menu-options')
		@include('kasus.partials.menu.menu-show')
		<div class="visible-xs panel-body">
		</div>

@endsection

@section('content')

	@if(Session::has('success'))
	<div class="alert alert-success alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	  <strong>Success!</strong> {{ Session::get('success') }}
	</div>
	@endif

	{!! Form::model($kasus) !!}

		@include('kasus.partials.form-show.informasi-kasus')
		@include('kasus.partials.form-show.klien-kasus')
		@include('kasus.partials.form-show.konselor')
		@include('kasus.partials.form-show.narasi')
		@include('kasus.partials.form-show.perkembangan')
		@include('kasus.partials.form-show.kasus-pentutup')

		<h3 class="section-heading">Keterangan</h3>
		@include('kasus.partials.form-show.bentuk-kekerasan')
		@include('kasus.partials.form-show.faktor-pemicu')
		@include('kasus.partials.form-show.layanan-dibutuhkan')

		<h3 class="section-heading">Arsip</h4>
		@include('kasus.partials.form-show.arsip')

	{!! Form::close() !!}

@endsection