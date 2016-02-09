@extends('layouts.records')

@section('content')

	<div class="col-sm-8 col-sm-offset-2">
		
		<h2>Cari Klien</h2>

		{!! Form::open(array('route' => array('search.klien'), 'class'=>'form', 'method' => 'POST')) !!}
				
				<div class="form-group">
					{!! Form::label('klien_id', 'Klien ID', array('class' => 'strongLabel')) !!}
					{!! Form::text('klien_id', null, array(
						'class' => 'form-control',
						'placeholder' => 'Nomor ID Klien',
						'autocomplete' => 'off')) !!}
				</div>
				
				<div class="form-group">
					{!! Form::label('nama_klien', 'Nama Klien', array('class' => 'strongLabel')) !!}
					{!! Form::text('nama_klien', null, array(
						'class' => 'form-control',
						'placeholder' => 'Nama Klien',
						'autocomplete' => 'off',
						'autofocus')) !!}
				</div>

				<div class="form-group form-inline">
					<label>
						{!! Form::radio('kelamin', 'Perempuan') !!} Perempuan 
					</label>
					<label>
						{!! Form::radio('kelamin', 'Laki-laki') !!} Laki-laki
					</label>
				</div>

				<div class="form-group">
					{!! Form::label('email', 'E-mail Klien', array('class' => 'strongLabel')) !!}
					{!! Form::text('email', null, array(
						'class' => 'form-control',
						'placeholder' => 'E-mail Klien',
						'autocomplete' => 'off' )) !!}
				</div>

				<div class="form-group">
          {!! Form::label('kabupaten', 'Kabupaten', array('class' => 'strongLabel')) !!}
          {!! Form::select('kabupaten', array(
          	' '				=>	' ',
          	'Bantul'		=>	'Bantul',
          	'Gunungkidul'	=>	'Gunungkidul',
          	'Kulon Progo'	=>	'Kulon Progo',
          	'Sleman'		=>	'Sleman',
          	'Yogyakarta'	=>	'Yogyakarta'
          ), null, array('class' => 'form-control'))!!}
        </div>

				<div class="form-group">
					<button type="submit" class="btn btn-default form-control" id="search-button">
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Penelusuran
					</button>
				</div>
				
		{!! Form::close() !!}
	</div>

@endsection