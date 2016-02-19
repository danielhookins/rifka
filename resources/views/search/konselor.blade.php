@extends('layouts.records')

@section('content')

	<div class="col-sm-8 col-sm-offset-2">
		
		@include('search.partials.konselor', array('type' => 'konselor', 'referPage' => null))

	</div>

@endsection