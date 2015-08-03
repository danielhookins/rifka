@extends('layouts.kasus')

@section('menu')

	<div class="visible-xs">
		@include('kasus.partials.mobile-box')
	</div>
	
	@include('kasus.partials.menu-options')
	
	@include('kasus.partials.menu-list')
	
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
		
		@include('kasus.partials.klien-kasus', array('type' => 'Klien'))
		@include('kasus.partials.informasi-kasus')
		@include('kasus.partials.narasi')
		@include('kasus.partials.konselor')
		@include('kasus.partials.perkembangan')

		<h3 class="section-heading">
				Keterangan
		</h3>
		@include('kasus.partials.bentuk-kekerasan')
		@include('kasus.partials.faktor-pemicu')
		@include('kasus.partials.upaya-dilakukan')
		@include('kasus.partials.layanan-dibutuhkan')
		@include('kasus.partials.dampak')

		<h3 class="section-heading">
				Litigasi
		</h3>
		@include('kasus.partials.litigasi')

<!--
		<h3 class="section-heading">
				Layanan
		</h3>
		@include('kasus.partials.layanan-diberikan')
-->

		<h3 class="section-heading">
				Arsip
		</h3>
		@include('kasus.partials.arsip')

@endsection