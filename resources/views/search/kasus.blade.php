@extends('layouts.records')

@section('content')

	<div class="col-sm-8 col-sm-offset-2">
		
		<h2>Cari Kasus</h2>

		{!! Form::open(array('route' => array('search.kasus'), 'class'=>'form', 'method' => 'POST')) !!}
				
				<div class="form-group">
					{!! Form::label('kasus_id', 'Kasus ID', array('class' => 'strongLabel')) !!}
					{!! Form::text('kasus_id', null, array(
						'class' => 'form-control',
						'placeholder' => 'Nomor ID Kasus',
						'autocomplete' => 'off')) !!}
				</div>

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

				<div class="form-group">
					<button type="submit" class="btn btn-default form-control" id="search-button">
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Penelusuran
					</button>
				</div>
				
		{!! Form::close() !!}
	</div>

@endsection