<h2>Klien Baru</h2>

{!! Form::open(array('route' => 'klien.store')) !!}
{!! Form::token() !!}

<div class="well">
<h3>Informasi Pribadi</h3>

	<div class="form-group">
		{!! Form::text('nama_klien', null, array('class' => 'form-control','placeholder' => 'Nama Klien','autofocus')) !!}
	</div>
	
	<div class="form-group form-inline">
		{!! Form::radio('kelamin', 'Perempuan') !!} Perempuan 
		{!! Form::radio('kelamin', 'Laki-laki') !!} Laki-laki
	</div>
	
	<div class="form-group">
		{!! Form::label('tanggal_lahir', 'Tanggal Lahir', array('class' => '')) !!}
		{!! Form::date('tanggal_lahir', null, array('class' => 'form-control')) !!}
	</div>
	
	<div class="form-group">
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
		{!! Form::select('status_perkawinan', array(
			'Status Perkawinan' =>	'Status Perkawinan', 
			'Belum Menikah' 	=>	'Belum Menikah', 
			'Menikah' 			=>	'Menikah', 
			'Cerai' 			=>	'Cerai', 
			'Janda'				=>	'Janda'
		), null, array('class' => 'form-control'))!!}
	</div>
</div>

<h3>Informasi Kontak</h3>

	<div class="form-group">
		{!! Form::text('no_telp', null, array('class' => 'form-control','placeholder' => 'Nomor Telpon')) !!}
	</div>

	<div class="form-group">	
		{!! Form::label('', 'Alamat', array('class' => '')) !!}
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
	
	<div class="form-group">
		{!! Form::text('email', null, array('class' => 'form-control','placeholder' => 'Email')) !!}
	</div>
	

	<h3>Informasi Tambahan</h3>
	
	<div class="form-group form-inline">
		{!! Form::label('jumlah_anak', 'Dalam keluarga: Jumlah', array('class' => '')) !!}
		{!! Form::number('jumlah_anak', 'null', array('class' => 'form-control','placeholder' => 'Anak')) !!}
		{!! Form::number('tanggungan', 'null', array('class' => 'form-control','placeholder' => 'Tanggungan')) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('pekerjaan', 'Pekerjaan') !!}
		{!! Form::text('pekerjaan', null, array('class' => 'form-control', 'placeholder' => 'Pekerjaan')) !!}
	</div>
	
	<div class="form-group">
		{!! Form::text('jabatan', null, array('class' => 'form-control','placeholder' => 'Jabatan')) !!}
	</div>

	<div class="form-group">
		{!! Form::select('penghasilan', array(
			'Penghasilan' 					=> 'Penghasilan',
			' '								=>	' ',
			'< Rp 500.000'					=>	'< Rp 500.000',
			'> Rp 500.000 < Rp 1.000.000'	=>	'> Rp 500.000 < Rp 1.000.000',
			'> Rp 1.000.000'				=>	'> Rp 1.000.000'
		), null, array('class' => 'form-control'))!!}
	</div>

	<div class="form-group">
		{!! Form::label('kondisi_klien', 'Lain') !!}
		{!! Form::text('kondisi_klien', null, array('class' => 'form-control','placeholder' => 'Kondisi Klien')) !!}
	</div>
	
	<div class="form-group">
		{!! Form::text('dirujuk_oleh', null, array('class' => 'form-control','placeholder' => 'Dirujuk Oleh')) !!}
	</div>

	<div class="row">
		<div class="col-sm-12" style="padding-top:10px;">
			{!! Form::submit('Simpan', array('class' => 'btn btn-success')) !!}
		</div>
	</div>

{!! Form::close() !!}