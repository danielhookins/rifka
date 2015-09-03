@extends('layouts.records')

@section('content')

<h2>{{$user->name}}</h2>
<p>{{ $user->jenis }}</p>
<ul>
	<li><a href="mailto:{{ $user->email}}">{{ $user->email }}</a></li>
</ul>

@endsection