<h3>Cari Kasus</h3>

{!! Form::open(array('route' => array('search.kasus'), 'class'=>'form', 'method' => 'POST')) !!}
<input name="searchType" value="kasus" type="hidden">	

	<div class="form-group">
		{!! Form::label('no_reg', 'Arsip Nomor Registrasi', array('class' => 'strongLabel')) !!}
		{!! Form::text('no_reg', null, array(
			'class' => 'form-control',
			'placeholder' => 'Arsip Nomor Registrasi',
			'autocomplete' => 'off')) !!}
	</div>

	<div class="form-group">
    {!! Form::label('media', 'Arsip Media', array('class' => 'strongLabel')) !!}
    {!! Form::select('media', array(
      ''       =>  '',
      'Tatap Muka'  =>  'Tatap Muka',
      'Telepon'     =>  'Telepon',
      'Outreach'    =>  'Outreach',
      'Email'       =>  'Email',
      'Internet'    =>  'Internet',
      'Surat'       =>  'Surat',
      'Lain'        =>  'Lain'
    ), null, array('class' => 'form-control'))!!}
  </div>

  <div class="form-group">
  	{!! Form::label('nama_klien', 'Nama Klien', array('class' => 'strongLabel')) !!}
  	{!! Form::text('nama_klien', null, array(
  		'class' => 'form-control',
  		'placeholder' => 'Nama Klien',
  		'autocomplete' => 'off')) !!}
  </div>

  <div class="form-group">
		{!! Form::label('jenis_klien', 'Jenis Klien', array('class' => 'strongLabel')) !!}
		{!! Form::select('jenis_klien', array(
			'' 						=>	'',
			'Korban'			=>  'Korban',
			'Pelaku'			=>	'Pelaku'
		), null, array('class' => 'form-control'))!!}
	</div>

  <div class="form-group">
		{!! Form::label('jenis_kasus', 'Jenis Kasus', array('class' => 'strongLabel')) !!}
		{!! Form::select('jenis_kasus', array(
			'' 						=>	'',
			'KTI'					=>  'KTI',
			'KDP'					=>	'KDP',
			'Perkosaan' 	=>	'Perkosaan',
			'Pel-Seks'		=>	'Pel-Seks',
			'KDK'					=>	'KDK',
			'Trafficking' => 	'Trafficking',
			'Lain'				=>	'Lain'
		), null, array('class' => 'form-control'))!!}
	</div>

	<div class="form-group">
		{!! Form::label('tahun', 'Tahun (kasus dibuka)', array('class' => 'strongLabel')) !!}
		{!! Form::text('tahun', null, array(
			'class' => 'form-control',
			'placeholder' => 'Tahun (kasus dibuka)',
			'autocomplete' => 'off')) !!}
	</div>

	@include('search.partials.btn-penelusuran')
		
{!! Form::close() !!}