@extends('layouts.master')

@section('nav')
	<h3>Quick links</h3>
	<h4>Klien</h4>
	<ul>
		<li><a href="{{ route('klien.index') }}">Cari Klein</a></li>
		<li><a href="{{ route('klien.create') }}">Klein Baru</a></li>
	</ul>

	<h4>Kasus</h4>
	<ul>
		<li><a href="{{ route('kasus.index') }}">Cari Kasus</a></li>
		<li><a href="{{ route('kasus.create') }}">Kasus Baru</a></li>
	</ul>
@endsection

@section('content')
	<h1>Konseling</h1>
@endsection