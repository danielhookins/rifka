@extends('layouts.klien')

@section('content')

	{!! Form::open(array('route' => array('laporan.lihat'), 
	        'class'=>'form','method' => 'POST')) !!}
		
		<div class="row">
			<h2>Membuat Laporan</h2>
			<div class="form-inline">
				{!! Form::label('tahun', 'Tahun', array('class' => 'strongLabel')) !!}
				{!! Form::text('tahun', $data["thisYear"], array('class' => 'form-control', 'autocomplete' => 'off')) !!}
			</div>
		</div>

		<div class="row">
		<h3>Kategori</h3>
			<div class="col-sm-6">
				<div class="form-group">
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
							{!! Form::checkbox('usia', 'Usia', False) !!} Usia
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

			<div class="col-sm-6">
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
		</div>

			<button class="btn btn-primary" type="submit">Membuat Laporan</button>
	
	{!! Form::close() !!}

@endsection	