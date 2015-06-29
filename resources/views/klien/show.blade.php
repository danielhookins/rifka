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

	<h2>Catatan Klien</h2>

	@include('klien.partials.form-show.action-bar')

	@include('klien.partials.form-show.pribadi')

	@include('klien.partials.form-show.kontak')

	@include('klien.partials.form-show.tambahan')

@endsection