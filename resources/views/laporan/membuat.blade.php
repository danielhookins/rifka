@extends('layouts.laporan')

@section('content')

	{!! Form::open(array('route' => array('laporan.lihat'), 
	        'class'=>'form','method' => 'POST')) !!}
		
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<h2>Membuat Laporan</h2>
				<div class="form-inline">
					{!! Form::label('tahun', 'Tahun', array('class' => 'strongLabel')) !!}
					{!! Form::text('tahun', $data["thisYear"], array('class' => 'form-control', 'autocomplete' => 'off')) !!}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-4 col-sm-offset-2">
				<h3>Kategori</h3>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-4 col-sm-offset-2">
			
				<div class="form-group">
					<div class="checkbox">
						<label>
							{!! Form::checkbox('kasus_id', 'Kasus ID', False) !!} Kasus ID
						</label>
					</div>
					<div class="checkbox">
						<label>
							{!! Form::checkbox('klien_id', 'Klien ID', False) !!} Klien ID
						</label>
					</div>
					<div class="checkbox">
						<label>
							{!! Form::checkbox('nama_klien', 'Nama Klien', False) !!} Nama Klien
						</label>
					</div>
					<div class="checkbox">
						<label>
							{!! Form::checkbox('jenis_kasus', 'Jenis Kasus', False) !!} Jenis Kasus
						</label>
					</div>
					<div class="checkbox">
						<label>
							{!! Form::checkbox('usia', 'Usia (Kasus dibuka)', False) !!} Usia (kasus dibuka)
						</label>
					</div>
					<div class="checkbox">
						<label>
							{!! Form::checkbox('kabupaten', 'Kabupaten', False) !!} Kabupaten
						</label>
					</div>
					<div class="checkbox">
						<label>
							{!! Form::checkbox('pendidikan', 'Pendidikan', False) !!} Pendidikan
						</label>
					</div>
					<div class="checkbox">
						<label>
							{!! Form::checkbox('pekerjaan', 'Pekerjaan', False) !!} Pekerjaan
						</label>
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
					<div class="checkbox">
						<label>
							{!! Form::checkbox('agama', 'Agama', False) !!} Agama
						</label>
					</div>
					<div class="checkbox">
						<label>
							{!! Form::checkbox('penghasilan', 'Penghasilan', False) !!} Penghasilan
						</label>
					</div>
					<div class="checkbox">
						<label>
							{!! Form::checkbox('status_perkawinan', 'Status Perkawinan', False) !!} Status Perkawinan
						</label>
					</div>
					<div class="checkbox">
						<label>
							{!! Form::checkbox('hubungan', 'Hubungan', False) !!} Hubungan
						</label>
					</div>
					<div class="checkbox">
						<label>
							{!! Form::checkbox('kondisi_klien', 'Kondisi Klien', False) !!} Kondisi Klien
						</label>
					</div>
				</div>
			</div>
		</div> <!-- row -->

		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<h3>Pilihan</h3>
				<div class="form-inline">
	        {!! Form::label('group_by', 'Memperlihatkan', array('class' => 'strongLabel')) !!}
	        {!! Form::select('group_by', array(
	          'semua' =>  'Semua Kasus',
	          'jenis_kasus' => 'Jumlah Jenis Kasus',
	          'usia' => 'Jumlah Usia (kasus dibuka)',
	          'kabupaten' => 'Jumlah Kabupaten',
	          'pendidikan' => 'Jumlah Pendidikan',
	          'pekerjaan' => 'Jumlah Pekerjaan',
	          'penghasilan' => 'Jumlah Penghasilan',
	          'agama' => 'Jumlah Agama',
	          'status_perkawinan' => 'Jumlah Status Perkawinan',
	          'hubungan' => 'Jumlah Hubungan',
	          'kondisi_klien' => 'Jumlah Kondisi Klien'
	        ), null, array('class' => 'form-control'))!!}
	      </div>
      </div>
		</div> <!-- row -->

		<div class="row">
			<br />
			<div class="col-sm-8 col-sm-offset-2">
				<button class="btn btn-primary" type="submit">Membuat Laporan</button>
			</div>
		</div> <!-- row -->
	
	{!! Form::close() !!}

@endsection	