@extends('layouts.klien')

@section('menu')

	@include('laporan.partials.menu-list')

@endsection

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
							{!! Form::checkbox('jenis_kasus', 'jenis_kasus', False) !!} Jenis Kasus
						</label>
					</div>
					<div class="checkbox">
						<label>
							{!! Form::checkbox('usia', 'usia', False) !!} Usia
						</label>
					</div>
					<div class="checkbox">
						<label>
							{!! Form::checkbox('kabupaten', 'kabupaten', False) !!} Kabupaten
						</label>
					</div>
					<div class="checkbox">
						<label>
							{!! Form::checkbox('pendidikan', 'pendidikan', False) !!} Pendidikan
						</label>
					</div>
					<div class="checkbox">
						<label>
							{!! Form::checkbox('pekerjaan', 'pekerjaan', False) !!} Pekerjaan
						</label>
					</div>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group">
					<div class="checkbox">
						<label>
							{!! Form::checkbox('agama', 'agama', False) !!} Agama
						</label>
					</div>
					<div class="checkbox">
						<label>
							{!! Form::checkbox('penghasilan', 'penghasilan', False) !!} Penghasilan
						</label>
					</div>
					<div class="checkbox">
						<label>
							{!! Form::checkbox('status_perkawinan', 'status_perkawinan', False) !!} Status Perkawinan
						</label>
					</div>
					<div class="checkbox">
						<label>
							{!! Form::checkbox('hubungan', 'hubungan', False) !!} Hubungan
						</label>
					</div>
					<div class="checkbox">
						<label>
							{!! Form::checkbox('kondisi_klien', 'kondisi_klien', False) !!} Kondisi Klien
						</label>
					</div>
				</div>
			</div>
		</div>

			<button class="btn btn-primary" type="submit">Membuat Laporan</button>
	
	{!! Form::close() !!}

@endsection	