@extends('layouts.records')

@section('content')

  @if (isset($list))
    
    @include('kasus.partials.list')

  @elseif (isset($show))
    
    @include('kasus.partials.show')

  @endif

@endsection