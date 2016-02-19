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
		{!! Form::radio('kelamin', 'Perempuan') !!} Perempuan 
		{!! Form::radio('kelamin', 'Laki-laki') !!} Laki-laki
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

	@include('search.partials.btn-penelusuran')
		
{!! Form::close() !!}