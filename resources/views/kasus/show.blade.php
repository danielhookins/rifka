@extends('layouts.kasus')

@section('menu')

		<div class="visible-xs">
			@include('kasus.partials.menu.mobile-box')
		</div>
		@include('kasus.partials.menu.menu-options')
		@include('kasus.partials.menu.menu-list')
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

	@if(Session::has('suggestion'))
	<div class="alert alert-warning alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	  {!! Session::get('suggestion') !!}
	</div>
	@endif

		<h3 class="section-heading" style="margin-top:-3px;">
				Kasus #{{$kasus->kasus_id}}
		</h3>
		
		@include('kasus.partials.form-show.klien-kasus', array('type' => 'Klien'))
		
		@include('kasus.partials.form-show.informasi-kasus')
		
		@include('kasus.partials.form-show.konselor')
		@include('kasus.partials.form-show.narasi')
		@include('kasus.partials.form-show.perkembangan')
		@include('kasus.partials.form-show.kasus-pentutup')

		<h3 class="section-heading">
				Keterangan
		</h3>
		@include('kasus.partials.form-show.bentuk-kekerasan')
		@include('kasus.partials.form-show.faktor-pemicu')
		@include('kasus.partials.form-show.upaya-dilakukan')
		@include('kasus.partials.form-show.layanan-dibutuhkan')
		@include('kasus.partials.form-show.dampak')

		<h3 class="section-heading">
				Litigasi
		</h3>
		@include('kasus.partials.form-show.litigasi')

		<h3 class="section-heading">
				Layanan
		</h3>
		@include('kasus.partials.form-show.layanan-diberikan')

		<h3 class="section-heading">
				Arsip
		</h3>
		@include('kasus.partials.form-show.arsip')

@endsection