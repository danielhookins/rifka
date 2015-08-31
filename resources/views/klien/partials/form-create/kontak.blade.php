<h3>Informasi Kontak</h3>

<div class="form-group
	@if($errors->has('no_telp')) has-error @endif">
	{!! Form::label('no_telp', 'Nomor Telpon', array('class' => 'strongLabel')) !!}
	{!! Form::text('no_telp', null, array('class' => 'form-control','placeholder' => 'Nomor Telpon')) !!}
	@if($errors->has('no_telp'))
		<p class="help-block">
			{{ $errors->first('no_telp') }}
		</p>
	@endif
</div>

<div class="form-group">	
	{!! Form::label('alamat', 'Alamat', array('class' => 'strongLabel')) !!}
	{!! Form::text('alamat', null, array('class' => 'form-control','placeholder' => 'Nama jalan dan nomor rumah')) !!}
</div>

<div class="form-group">
	{!! Form::select('kecamatan', array(
		'Kecamatan'		=>	'Kecamatan',
		' '				=>	' ',
		'Bambanglipuro'	=>	'Bambanglipuro',
		'Banguntapan'	=>	'Banguntapan',
		'Bantul'		=>	'Bantul',
		'Berbah'		=>	'Berbah',
		'Cangkringan'	=>	'Cangkringan',
		'Danurejan'		=>	'Danurejan',
		'Depok'			=>	'Depok',
		'Dlingo'		=>	'Dlingo',
		'Galur'			=>	'Galur',
		'Gamping'		=>	'Gamping',
		'Gedangsari'	=>	'Gedangsari',
		'Gedongtengen'	=>	'Gedongtengen',
		'Girimulyo'		=>	'Girimulyo',
		'Girisubo'		=>	'Girisubo',
		'Godean'		=>	'Godean',
		'Gondokusuman'	=>	'Gondokusuman',
		'Gondomanan'	=>	'Gondomanan',
		'Imogiri'		=>	'Imogiri',
		'Jetis'			=>	'Jetis',
		'Kalasan'		=>	'Kalasan',
		'Kalibawang'	=>	'Kalibawang',
		'Karangmojo'	=>	'Karangmojo',
		'Kasihan'		=>	'Kasihan',
		'Kokap'			=>	'Kokap',
		'Kotagede'		=>	'Kotagede',
		'Kraton'		=>	'Kraton',
		'Kretek'		=>	'Kretek',
		'Lendah'		=>	'Lendah',
		'Mantrijeron'	=>	'Mantrijeron',
		'Mergangsan'	=>	'Mergangsan',
		'Minggir'		=>	'Minggir',
		'Mlati'			=>	'Mlati',
		'Moyudan'		=>	'Moyudan',
		'Nanggulan'		=>	'Nanggulan',
		'Ngaglik'		=>	'Ngaglik',
		'Ngampilan'		=>	'Ngampilan',
		'Ngawen'		=>	'Ngawen',
		'Ngemplak'		=>	'Ngemplak',
		'Nglipar'		=>	'Nglipar',
		'Pajangan'		=>	'Pajangan',
		'Pakem'			=>	'Pakem',
		'Pakualaman'	=>	'Pakualaman',
		'Paliyan'		=>	'Paliyan',
		'Pandak'		=>	'Pandak',
		'Panggang'		=>	'Panggang',
		'Panjatan'		=>	'Panjatan',
		'Patuk'			=>	'Patuk',
		'Pengasih'		=>	'Pengasih',
		'Piyungan'		=>	'Piyungan',
		'Playen'		=>	'Playen',
		'Pleret'		=>	'Pleret',
		'Ponjong'		=>	'Ponjong',
		'Prambanan'		=>	'Prambanan',
		'Pundong'		=>	'Pundong',
		'Purwosari'		=>	'Purwosari',
		'Rongkop'		=>	'Rongkop',
		'Samigaluh'		=>	'Samigaluh',
		'Sanden'		=>	'Sanden',
		'Saptosari'		=>	'Saptosari',
		'Sedayu'		=>	'Sedayu',
		'Semanu'		=>	'Semanu',
		'Semin'			=>	'Semin',
		'Sentolo'		=>	'Sentolo',
		'Sewon'			=>	'Sewon',
		'Seyegan'		=>	'Seyegan',
		'Sleman'		=>	'Sleman',
		'Srandakan'		=>	'Srandakan',
		'Tanjungsari'	=>	'Tanjungsari',
		'Tegalrejo'		=>	'Tegalrejo',
		'Temon'			=>	'Temon',
		'Tempel'		=>	'Tempel',
		'Tepus'			=>	'Tepus',
		'Turi'			=>	'Turi',
		'Umbulharjo'	=>	'Umbulharjo',
		'Wates'			=>	'Wates',
		'Wirobrajan'	=>	'Wirobrajan',
		'Wonosari'		=>	'Wonosari'
	), null, array('class' => 'form-control'))!!}
</div>
<div class="form-group">
	{!! Form::select('kabupaten', array(
		'Kabupaten'	=>	'Kabupaten',
		' '				=>	' ',
		'Bantul'		=>	'Bantul',
		'Gunungkidul'	=>	'Gunungkidul',
		'Kulon Progo'	=>	'Kulon Progo',
		'Sleman'		=>	'Sleman',
		'Yogyakarta'	=>	'Yogyakarta',
	), null, array('class' => 'form-control'))!!}
</div>
<div class="form-group">
	{!! Form::select('provinsi', array(
		'Yogyakarta'				=>	'Yogyakarta',
		'Jakarta'					=>	'Jakarta',
		'Jawa Barat'				=>	'Jawa Barat',
		'Jawa Tengah'				=>	'Jawa Tengah',
		'Jawa Timur'				=>	'Jawa Timur',
		'Aceh'						=>	'Aceh',
		'Sumatera Utara'			=>	'Sumatera Utara',
		'Sumatera Barat'			=>	'Sumatera Barat',
		'Riau'						=>	'Riau',
		'Jambi'						=>	'Jambi',
		'Sumatera Selatan'			=>	'Sumatera Selatan',
		'Bengkulu'					=>	'Bengkulu',
		'Lampung'					=>	'Lampung',
		'Kepulauan Bangka Belitung'	=>	'Kepulauan Bangka Belitung',
		'Kepulauan Riau'			=>	'Kepulauan Riau',
		'Banten'					=>	'Banten',
		'Bali'						=>	'Bali',
		'Nusa Tenggara Timur'		=>	'Nusa Tenggara Timur',
		'Nusa Tenggara Barat'		=>	'Nusa Tenggara Barat',
		'Kalimantan Barat'			=>	'Kalimantan Barat',
		'Kalimantan Tengah'			=>	'Kalimantan Tengah',
		'Kalimantan Selatan'		=>	'Kalimantan Selatan',
		'Kalimantan Timur'			=>	'Kalimantan Timur',
		'Kalimantan Utara'			=>	'Kalimantan Utara',
		'Sulawesi Utara'			=>	'Sulawesi Utara',
		'Sulawesi Tengah'			=>	'Sulawesi Tengah',
		'Sulawesi Selatan'			=>	'Sulawesi Selatan',
		'Sulawesi Tenggara'			=>	'Sulawesi Tenggara',
		'Sulawesi Barat'			=>	'Sulawesi Barat',
		'Gorontalo'					=>	'Gorontalo',
		'Maluku'					=>	'Maluku',
		'Maluku Utara'				=>	'Maluku Utara',
		'Papua'						=>	'Papua',
		'Papua Barat'				=>	'Papua Barat',
	), null, array('class' => 'form-control')) !!}
</div>

<div class="form-group
	@if($errors->has('email')) has-error @endif">
	{!! Form::label('email', 'Email', array('class' => 'strongLabel')) !!}
	{!! Form::text('email', null, array('class' => 'form-control','placeholder' => 'Email')) !!}
	@if($errors->has('email'))
		<p class="help-block">
			{{ $errors->first('email') }}
		</p>
	@endif
</div>