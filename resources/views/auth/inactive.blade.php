@extends('layouts.master')

@section('content')

@if(Session::has('new-registration'))
	<div class="panel panel-info">

		<div class="panel-heading">
		  <h4 class="panel-title">
		    <a class="in-link" name="informasi-kasus">
		      <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
		      Mintaan sedang diprocess
		    </a>
		  </h4>
		</div>

		<div class="panel-body">
			<p>Terima kasih {{ Auth::user()->name }}</p>
			<strong>Login Anda sedang diproses oleh pengelola.</strong><br />
			<br />
			<a class="btn btn-default" href="{{ route('logout') }}" aria-label="Log out">
			  <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
			  &nbsp;Log out
			</a>

		</div>

	</div>

@else
	<div class="panel panel-danger">

		<div class="panel-heading">
		  <h4 class="panel-title">
		    <a class="in-link" name="informasi-kasus">
		      <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
		      Maaf, login Anda belum aktif
		    </a>
		  </h4>
		</div>

		<div class="panel-body">
			<p>{{ Auth::user()->name }}</p>
			<strong>Login Anda belum aktif</strong>, sedang diproses oleh pengelola.<br />
			<br />
			<a class="btn btn-default" href="{{ route('logout') }}" aria-label="Log out">
			  <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
			  &nbsp;Log out
			</a>

		</div>

	</div>

@endif

@endsection