@extends('layouts.records')

@section('content')


<h2>Datepicker</h2>

{!! Form::open(array('route' => array('test.post'), 'class'=>'form', 'method' => 'POST')) !!}

<div class="form-group">
	{!! Form::label('tanggal_lahir', 'Tanggal Lahir', array('class' => 'strongLabel')) !!}
	{!! Form::date('tanggal_lahir', null, array(
		'class' => 'form-control date-picker')) !!}
</div>
<div class="form-group">
	<button type="submit">Submit</button>
</div>

{!! Form::close() !!}

@endsection