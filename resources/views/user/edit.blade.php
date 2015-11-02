@extends('layouts.records')

@section('content')
	{!! Form::model($user, array(
	        'route' => array('user.update', 
	          $user->id), 
	        'class'=>'form', 
	        'method' => 'PUT')) 
  !!}

<h2>Edit User</h2>

  <div class="form-group">
    {!! Form::label('id', 'User ID', array('class' => 'strongLabel')) !!}
    {!! Form::text('id', null, array('class' => 'form-control', 'autocomplete' => 'off', 'readonly' => 'readonly')) !!}
  </div>

  <div class="form-group">
    {!! Form::label('name', 'Nama', array('class' => 'strongLabel')) !!}
    {!! Form::text('name', null, array('class' => 'form-control', 'autocomplete' => 'off')) !!}
  </div>

  <div class="form-group">
    {!! Form::label('email', 'E-mail', array('class' => 'strongLabel')) !!}
    {!! Form::text('email', null, array('class' => 'form-control', 'autocomplete' => 'off')) !!}
  </div>

	<div class="form-group">
    {!! Form::label('jenis', 'Jenis', array('class' => 'strongLabel')) !!}
    {!! Form::select('jenis', array(
            'Konselor' 			=> 'Konselor',
            'Manager'  			=> 'Manager',
            'Front Office'	=> 'Front Office',
            'Developer'     => 'Developer'
          ), null, array('class' => 'form-control')) !!}
  </div>

  <div class="form-group">
    {!! Form::label('active', 'Status', array('class' => 'strongLabel')) !!}
    {!! Form::select('active', array(
            '0' => 'Tidak Aktif',
            '1' => 'Aktif'), null, array('class' => 'form-control')) !!}
  </div>
  
  <button class="btn btn-default" type="submit" name="updateBtn" value="update">Simpan</button>

  {!! Form::close() !!}
@endsection