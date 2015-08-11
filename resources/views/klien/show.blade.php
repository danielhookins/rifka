@extends('layouts.klien')

@section('menu')

	<div class="visible-xs">
		@include('klien.partials.mobile-box')
	</div>
	
	@include('klien.partials.menu-options')
	
	@include('klien.partials.menu-list')
	
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
				Klien #{{$klien->klien_id}}
		</h3>
		
		@include('klien.partials.pribadi')
		@include('klien.partials.kontak')
		@include('klien.partials.tambahan')

@endsection	