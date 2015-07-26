@extends('layouts.records')

@section('content')

	<h2>Konselor Baru</h2>

	@if (count($errors) > 0)
	  <div class="alert alert-danger">
	    <ul>
	      @foreach ($errors->all() as $error)
	        <li>{{ $error }}</li>
	      @endforeach
	  </ul>
	  </div>
	@endif

	{!! Form::open(array(
		'route' => array('konselor.store'),
		'method' => 'POST')) 
	!!}

	<div class="form-group">
		{!! Form::label('nama_konselor', 'Nama Konselor', array('class' => 'strongLabel')) !!}
		{!! Form::text('nama_konselor', null, array(
		  'class'     => 'form-control',
		  'placeholder'   => 'Nama konselor'))
		!!}
	</div>

	<div class="form-group">
		{!! Form::label('user_id', 'User ID', array('class' => 'strongLabel')) !!}
		{!! Form::text('user_id', null, array(
		  'class'     => 'form-control',
		  'placeholder'   => 'User ID'))
		!!}
	</div>

	<div class="form-group">
		{!! Form::submit('Submit', array('class' => 'btn btn-default')) !!}
		<a class="btn btn-default" href="{{ route('konselor.index') }}">
			Back
		</a>
	</div>

	{!! Form::close() !!}

@endsection