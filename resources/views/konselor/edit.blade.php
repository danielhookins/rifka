@extends('layouts.records')

@section('content')

	<h2>Edit Konselor</h2>

	{!! Form::model($konselor, array(
		'route' => array('konselor.update', $konselor->konselor_id),
		'method' => 'PUT')) 
	!!}

	<div class="form-group">
		{!! Form::label('nama_konselor', 'Nama Konselor', array('class' => 'strongLabel')) !!}
		{!! Form::text('nama_konselor', null, array(
		  'class'     => 'form-control',
		  'autocomplete' => 'off',
		  'placeholder'   => 'Nama konselor'))
		!!}
	</div>

	<div class="form-group">
		{!! Form::label('user_id', 'User ID', array('class' => 'strongLabel')) !!}
		{!! Form::text('user_id', null, array(
		  'class'     => 'form-control',
		  'autocomplete' => 'off',
		  'placeholder'   => 'User ID'))
		!!}
	</div>
	<div class="form-group">
		{!! Form::submit('Submit', array('class' => 'btn btn-default')) !!}
		<a class="btn btn-default" href="{{route('konselor.show', $konselor->konselor_id)}}">
			Back
		</a>
	</div>

	{!! Form::close() !!}

@endsection