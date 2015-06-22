@extends('layouts.master')

@section('content')
	<div class="container">
		<h2>Administrasi</h2>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-2 opt-left">
				@include('klien.partials.search')
			</div>
			<div class="col-sm-4 col-sm-offset-1x">
				@include('klien.partials.new')
			</div>
		</div>
	</div>
	
	
@endsection