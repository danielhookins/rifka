<h3>Informasi Tambahan</h3>

<div class="form-group">
	{!! Form::label('jumlah_anak', 'Jumlah Anak', array('class' => 'strongLabel')) !!}
	{!! Form::number('jumlah_anak', 'null', array('class' => 'form-control','placeholder' => 'Anak')) !!}
</div>

<div class="form-group">
	{!! Form::label('tanggungan', 'Jumlah Tanggungan', array('class' => 'strongLabel')) !!}
	{!! Form::number('tanggungan', 'null', array('class' => 'form-control','placeholder' => 'Tanggungan')) !!}
</div>

<div class="form-group">
	{!! Form::label('pekerjaan', 'Pekerjaan', array('class' => 'strongLabel')) !!}
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
	{!! Form::label('kondisi_klien', 'Lain', array('class' => 'strongLabel')) !!}
	{!! Form::text('kondisi_klien', null, array('class' => 'form-control','placeholder' => 'Kondisi Klien')) !!}
</div>

<div class="form-group">
	{!! Form::text('dirujuk_oleh', null, array('class' => 'form-control','placeholder' => 'Dirujuk Oleh')) !!}
</div>