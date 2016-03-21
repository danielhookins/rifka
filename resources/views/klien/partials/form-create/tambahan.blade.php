<h3>Informasi Tambahan</h3>

<div class="form-group">
	{!! Form::label('jumlah_anak', 'Jumlah Anak', array('class' => 'strongLabel')) !!}
	{!! Form::number('jumlah_anak', 'null', array('class' => 'form-control', 'autocomplete' => 'off')) !!}
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
    'S1' => 'S1',
    'S2' => 'S2',
    'S3' => 'S3',
    'D3' => 'D3'), null, array(
      'class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('pekerjaan', 'Pekerjaan', array('class' => 'strongLabel')) !!}
	{!! Form::text('pekerjaan', null, array('class' => 'form-control', 'placeholder' => 'Pekerjaan', 'autocomplete' => 'off')) !!}
</div>

<div class="form-group">
	{!! Form::label('jabatan', 'Jabatan', array('class' => 'strongLabel')) !!}
	{!! Form::text('jabatan', null, array('class' => 'form-control','placeholder' => 'Jabatan', 'autocomplete' => 'off')) !!}
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
	{!! Form::label('kondisi_klien', 'Kondisi Klien', array('class' => 'strongLabel')) !!}
	{!! Form::text('kondisi_klien', null, array('class' => 'form-control','placeholder' => 'Kondisi Klien', 'autocomplete' => 'off')) !!}
</div>

<div class="form-group">
	{!! Form::label('dirujuk_oleh', 'Dirujuk Oleh', array('class' => 'strongLabel')) !!}
	{!! Form::text('dirujuk_oleh', null, array('class' => 'form-control','placeholder' => 'Dirujuk Oleh', 'autocomplete' => 'off')) !!}
</div>

<div class="form-group">
	{!! Form::label('keterangan', 'Keterangan', array('class' => 'strongLabel')) !!}
	<textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="10" autocomplete="off"></textarea>
</div>