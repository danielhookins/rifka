<h3>Cari {{ucfirst($type)}}</h3>

{!! Form::open(array('route' => array('search.klien'), 'class'=>'form', 'method' => 'POST')) !!}
<input name="searchType" value="klien" type="hidden">	
	
	<input name="refer-page" value="{{ $referPage }}" type="hidden">
	<input name="type" value="{{ $type }}" type="hidden">
	@if(isset($kasus_id) && $kasus_id != null) 
		<input name="kasus_id" value="{{ $kasus_id }}" type="hidden">
	@endif

	<div class="form-group">
		{!! Form::text('nama_klien', null, array(
			'class' => 'form-control',
      'placeholder' => 'Nama '.$type,
      'autocomplete' => 'off', 
      'autofocus')) !!}
	</div>

	<div class="form-group form-inline">
	    {!! Form::radio('fuzzy', 'exact', true) !!} Sama persis 
	    {!! Form::radio('fuzzy', 'fuzzy') !!} Perkiraan
	</div>
	
	<div class="form-group">
	    {!! Form::label('kelamin', 'Kelamin', array('class' => 'strongLabel')) !!}
	    {!! Form::select('kelamin', array(
	    	'Perempuan'		=>	'Perempuan',
	    	'Laki-laki'		=>	'Laki-laki'
	    ), null, array('class' => 'form-control'))!!}
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
  		{!! Form::label('tahun', 'Tahun pertama kali klien ke Rifka', array('class' => 'strongLabel')) !!}
  		{!! Form::text('tahun', null, array(
  			'class' => 'form-control',
  			'placeholder' => 'Tahun pertama kali klien ke Rifka',
  			'autocomplete' => 'off' )) !!}
  	</div>

	@include('search.partials.btn-penelusuran')
		
{!! Form::close() !!}