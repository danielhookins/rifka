@extends('layouts.records')

@section('content')

  @if (isset($list))
    
    @include('klien.partials.list')

  @elseif (isset($show))
    
    @include('klien.partials.show')

	@elseif (isset($edit))
    
    @include('klien.partials.edit')

  @endif

@endsection