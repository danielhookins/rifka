<h3>Informasi Tambahan</h3>

<div class="form-group">
	{!! Form::label('jumlah_anak', 'Jumlah Anak', array('class' => 'strongLabel')) !!}
	{!! Form::number('jumlah_anak', 'null', array('class' => 'form-control','placeholder' => 'Anak')) !!}
</div>

<div class="form-group">
  {!! Form::label('pendidikan', 'Pendidikan', array('class' => 'strongLabel')) !!}
  (Klien telah lulus)
  {!! Form::select('pendidikan', array(
    'Pendidikan'  => 'Pendidikan',
    'Tidak Sekolah' => 'Tidak Sekolah',
    'TK' => 'TK',
    'SD' => 'SD',
    'SLTP' => 'SLTP',
    'SLTA' => 'SLTA',
    'S1/S2/S3' => 'S1/S2/S3',
    'D3' => 'D3'), null, array(
      'class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('pekerjaan', 'Pekerjaan', array('class' => 'strongLabel')) !!}
	{!! Form::text('pekerjaan', null, array('class' => 'form-control', 'placeholder' => 'Pekerjaan')) !!}
</div>

<div class="form-group">
	{!! Form::text('jabatan', null, array('class' => 'form-control','placeholder' => 'Jabatan')) !!}
</div>

<div class="form-group">
	{!! Form::label('penghasilan', 'Penghasilan', array('class' => 'strongLabel')) !!}
	{!! Form::select('penghasilan', array(
		'Penghasilan' 					=> 'Penghasilan',
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