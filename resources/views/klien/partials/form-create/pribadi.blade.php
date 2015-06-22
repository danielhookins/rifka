<h3>Informasi Pribadi</h3>

<div class="form-group">
	{!! Form::label('nama_klien', 'Nama Klien', array('class' => 'strongLabel')) !!}
	{!! Form::text('nama_klien', null, array(
		'class' 		=> 'form-control',
		'placeholder' 	=> 'Nama Klien',
		'autofocus')) 
	!!}
</div>

<div class="form-group form-inline">
	{!! Form::radio('kelamin', 'Perempuan') !!} Perempuan 
	{!! Form::radio('kelamin', 'Laki-laki') !!} Laki-laki
</div>

<div class="form-group">
	{!! Form::label('tanggal_lahir', 'Tanggal Lahir', array('class' => 'strongLabel')) !!}
	{!! Form::date('tanggal_lahir', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('agama', 'Agama', array('class' => 'strongLabel')) !!}
	{!! Form::select('agama', array(
		'Agama' 		=>	'Agama', 
		'Islam' 		=>	'Islam', 
		'Protestan' 	=>	'Protestan', 
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