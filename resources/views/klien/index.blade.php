@extends('layouts.records')

@section('content')
	@if (isset($search))
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			@include('klien.partials.search')
		</div>
	</div>
	@endif

	<div class=row>
	@if (isset($list))
		<div class="col-sm-12"> 
		@include('klien.partials.list')
		</div>
	@elseif (isset($show))
	  <div class="col-sm-12">
		@include('klien.partials.show')
		</div>
	@elseif (isset($edit))
	  <div class="col-sm-12">  
		@include('klien.partials.edit')
		</div>
	@elseif (isset($create))
	  <div class="row">
		<div class="col-sm-7 col-sm-offset-2">
			@include('klien.partials.create')
		</div>
	</div>
	@endif
	</div>
@endsection