@extends('layouts.master')

@section('nav')
	<h2>Quick Menu</h2>
	<ul>
		<li>Cari Kasus</li>
		<li>Kasus Baru</li>
	</ul>
@endsection

@section('content')
	<h1>Konseling</h1>
	{!! HTML::image('images/mockups/konseling-home-01.png', 'Counselling Home', ['style="display:block;margin-left:auto;margin-right:auto;padding-top:10px;"']) !!}

@endsection