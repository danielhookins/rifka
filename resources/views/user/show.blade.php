@extends('layouts.records')

@section('content')

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