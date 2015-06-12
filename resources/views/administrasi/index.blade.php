@extends('layouts.master')

@section('content')
	<div class="container">
		<h1>Administrasi</h1>
		<div class="row">
			<div class="col-sm-3 col-sm-offset-2">
				@include('klien.partials.search')
			</div>
			<div class="col-sm-3 col-sm-offset-2">
				@include('klien.partials.new')
			</div>
		</div>
	</div>
	
	
@endsection