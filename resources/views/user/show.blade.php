@extends('layouts.records')

@section('content')

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
  <strong>Success!</strong> {{ Session::get('success') }}
</div>
@endif
@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
  <strong>Error!</strong> {{ Session::get('error') }}
</div>
@endif

<h3>Informasi User</h3>

<table class="table">
	<tr>
		<td>
			<strong>Nama</strong>
		</td>
		<td>
			{{ $user->name}}
		</td>
	</tr>
	<tr>
		<td>
			<strong>Jenis</strong>
		</td>
		<td>
			{{ $user->jenis }}
		</td>
	</tr>
	<tr>
		<td>
			<strong>E-mail</strong>
		</td>
		<td>
			<a href="mailto:{{ $user->email}}">{{ $user->email }}</a>
		</td>
	</tr>
</table>


	@if (isset($cases) && !empty($cases))
		
		@include('user.partials.kasus')
	
	@endif

@endsection