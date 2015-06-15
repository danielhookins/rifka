@extends('layouts.records')

@section('content')

  @if (isset($search))
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			@include('kasus.partials.search')
		</div>
	</div>
	@endif

  @if (isset($list))
    
    @include('kasus.partials.list')

  @elseif (isset($show))
    
    @include('kasus.partials.show')

	@elseif (isset($create))
		@include('kasus.partials.create')

  @endif

@endsection