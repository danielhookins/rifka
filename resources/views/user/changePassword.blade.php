@extends('layouts.records')

@section('content')

@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Perhatian!</strong> Ada masalah dengan memasukkan Anda.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

{!! Form::model($user, array(
        'route' => array('user.update', 
          $user->id), 
        'class'=>'form', 
        'method' => 'PUT')) 
!!}

<h2>Ganti Kata Sandi</h2>

  <div class="form-group">
    {!! Form::label('email', 'User', array('class' => 'strongLabel')) !!}<br />
    {{ $user->email }}
  </div>

  <div class="form-group">
    {!! Form::label('passwordNew', 'Kata Sandi Baru', array('class' => 'strongLabel')) !!}<br />
    {!! Form::password('passwordNew', null, array('class' => 'form-control', 'autocomplete' => 'off')) !!}
  </div>

  <div class="form-group">
    {!! Form::label('passwordAgain', 'Kata Sandi Baru Lagi', array('class' => 'strongLabel')) !!}<br />
    {!! Form::password('passwordAgain', null, array('class' => 'form-control', 'autocomplete' => 'off')) !!}
  </div>

  <button type="submit" name="changePasswordBtn" value="changePassword">Ganti Kata Sandi</button>

  {!! Form::close() !!}
@endsection