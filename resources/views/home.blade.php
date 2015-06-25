@extends('layouts.records')

@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-6 col-sm-offset-3 well">
		@include('partials.search')
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-3 col-sm-offset-3">
		@include('klien.partials.new')
	</div>
	<div class="col-xs-12 col-sm-3">
		@include('kasus.partials.new')
	</div>
</div>
@endsection
