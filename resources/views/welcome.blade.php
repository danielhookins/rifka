@extends('layouts.master')

@section('content')
  
	<div class="row">
		<div class="col-sm-12">
		</div>
  </div>
	
	<div class="row">
		<div class="col-sm-8 col-sm-offset-3">
			@include('auth.login')
		</div>
	</div>
	
@endsection