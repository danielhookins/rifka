@extends('layouts.records')

@section('content')

	<h2>Perhatian!</h2>
	<p>Anda yakin, ingin menghapus user ini?</p>

	<table class="table">
		<tr>
			<td><strong>Nama</strong></td>
			<td>{{ $user->name}}</td>
		</tr>
		<tr>
			<td><strong>Jenis</strong></td>
			<td>{{ $user->jenis }}</td>
		</tr>
		<tr>
			<td><strong>E-mail</strong></td>
			<td>{{ $user->email }}</td>
		</tr>
	</table>

	{!! Form::open(array('route' => array('user.deleteUser'), 'class'=>'form-inline', 'method' => 'POST')) !!}
		<input name="user_id" hidden="true" value="{{ $user->id }}" />
		
		<button type="submit" class="btn btn-sm btn-danger">
			<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
			Menghapus
		</button>

		<a class="btn btn-sm btn-default" href="{{ route('user.management')}}">Batal</a>
	{!! Form::close() !!}

@endsection