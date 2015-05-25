@extends('layouts.master')

@section('nav')
	<h2>Quick Menu</h2>
	<ul>
		<li>Cari Klien</li>
		<li>Klien Baru</li>
	</ul>
@endsection

@section('content')
	<h1>Administrasi</h1>
	{!! HTML::image('images/mockups/cari-klien-01.png', 'Search for client', ['style="display:block;margin-left:auto;margin-right:auto;padding-top:10px;"']) !!}

@endsection