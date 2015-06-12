@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 well">
			@include('partials.search')
		</div>
	</div>
	<div class="row">
		<div class="row">
			<div class="col-sm-3 col-sm-offset-3">
				@include('klien.partials.new')
			</div>
			<div class="col-sm-3">
				@include('kasus.partials.new')
			</div>
		</div>
	</div>
</div>
@endsection
