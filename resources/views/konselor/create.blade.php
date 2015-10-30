@extends('layouts.records')

@section('content')
<div class="row">
	<div class="col-sm-6 col-offset-sm-3">
	
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
		  'autocomplete' => 'off',
		  'placeholder'   => 'Nama Konselor'))
		!!}
	</div>

	<div class="form-group">
		{!! Form::submit('Simpan', array('class' => 'btn btn-default')) !!}
		<a class="btn btn-default" href="{{ route('konselor.index') }}">
			Batal
		</a>
	</div>

	{!! Form::close() !!}

	</div>
</div>
@endsection