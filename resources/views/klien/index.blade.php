@extends('layouts.records')

@section('content')
	
	@if (isset($search))
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
			@include('klien.partials.search')
		</div>
	</div>
	@endif

	<div class="row">
	
	@if (isset($list))
		<div class="col-sm-12"> 
		@include('klien.partials.list')
		</div>

	@endif
	
	</div>

@endsection