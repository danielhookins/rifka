@extends('layouts.records')

@section('content')

	<div class="col-sm-8 col-sm-offset-2">
		
		@include('search.partials.klien', array('type' => 'klien', 'referPage' => null))

	</div>

@endsection