@extends('layouts.records')

@section('content')

  @if (isset($search))
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
			@include('kasus.partials.search')
		</div>
	</div>
	@endif

  @if (isset($list))
  
    @include('kasus.partials.list')

  @endif

@endsection