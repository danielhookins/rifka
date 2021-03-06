<h3>Informasi Pribadi</h3>

<div class="form-group 
	@if($errors->has('nama_klien')) has-error @endif">
	{!! Form::label('nama_klien', 'Nama Klien', array('class' => 'strongLabel')) !!}
	{!! Form::text('nama_klien', null, array(
		'class' 		=> 'form-control',
		'placeholder' 	=> 'Nama Klien',
		'autofocus', 'autocomplete' => 'off')) !!}
	@if($errors->has('nama_klien'))
		<p class="help-block">
			{{ $errors->first('nama_klien') }}
		</p>
	@endif
</div>

<div class="form-group form-inline 
	@if($errors->has('kelamin')) has-error @endif">
	{!! Form::radio('kelamin', 'Perempuan') !!} Perempuan 
	{!! Form::radio('kelamin', 'Laki-laki') !!} Laki-laki
	@if($errors->has('kelamin'))
		<p class="help-block">
			{{ $errors->first('kelamin') }}
		</p>
	@endif
</div>

<div class="form-group
	@if($errors->has('tanggal_lahir')) has-error @endif">
	{!! Form::label('tanggal_lahir', 'Tanggal Lahir', array('class' => 'strongLabel')) !!}
	{!! Form::text('tanggal_lahir', null, array('class' => 'form-control date-picker', 'autocomplete' => 'off')) !!}
	@if($errors->has('tanggal_lahir'))
		<p class="help-block">
		{{ $errors->first('kelamin') }}
		</p>
	@endif
</div>

<div class="form-group 
	@if($errors->has('nama_orangtua')) has-error @endif">
	{!! Form::label('nama_orangtua', 'Nama Orangtua', array('class' => 'strongLabel')) !!}
	{!! Form::text('nama_orangtua', null, array(
		'class' 		=> 'form-control',
		'placeholder' 	=> 'Nama Orangtua',
		'autofocus', 'autocomplete' => 'off')) !!}
	@if($errors->has('nama_orangtua'))
		<p class="help-block">
			{{ $errors->first('nama_orangtua') }}
		</p>
	@endif
</div>

<div class="form-group">
	{!! Form::label('agama', 'Agama', array('class' => 'strongLabel')) !!}
	{!! Form::select('agama', array(
		'Agama' 		=>	'Agama', 
		'Islam' 		=>	'Islam', 
		'Kristen' 	=>	'Kristen', 
		'Katolik' 		=>	'Katolik', 
		'Hindu' 		=>	'Hindu', 
		'Buddha' 		=>	'Buddha', 
		'Kong Hu Cu' 	=>	'Kong Hu Cu', 
		'Lain'			=>	'Lain'
	), null, array('class' => 'form-control'))!!}
</div>

<div class="form-group">
	{!! Form::label('status_perkawinan', 'Status Perkawinan', array('class' => 'strongLabel')) !!}
	{!! Form::select('status_perkawinan', array(
		'Status Perkawinan' =>	'Status Perkawinan', 
		'Belum Menikah' 	=>	'Belum Menikah', 
		'Menikah' 			=>	'Menikah', 
		'Cerai' 			=>	'Cerai', 
		'Janda'				=>	'Janda'
	), null, array('class' => 'form-control'))!!}
</div>