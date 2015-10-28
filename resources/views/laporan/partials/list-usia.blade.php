{!! Form::model($displayModel, array('route' => array('laporan.usia.list.update'), 
	        'class'=>'form-inline','method' => 'POST')) !!}
	<h3>
		Daftar korban berusia 
		{!! Form::select('age', array(
        'anakKecil' =>  'Anak Kecil (Usia < 12)', 
        'remaja12sd15' => 'Remaja (Usia 12-15)',
        'remaja16sd17' => 'Remaja (Usia 16-17)',
        'dewasa' => 'Dewasa (18+)'
      ), null, array(
        'class' => 'form-control',
        'id' => 'age'
      ))!!}
      untuk tahun  
		<button class="btn btn-default" type="submit" name="change" value="prev">
			<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
		</button>
		<input style="width:70px;text-align:center" autocomplete="off" id="year" name="year" value="{{ $displayModel["year"] }}">
		<button class="btn btn-default" @if($displayModel["year"] == Carbon\Carbon::today()->format('Y')) disabled @endif type="submit" name="change" value="next">
			<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
		</button>
		<button class="btn btn-default" type="submit">Update</button>
	</h3>
	<div class="help-block">
		Umurnya waktu kasus dibuka
	</div>
{!! Form::close() !!}

<table id="datatable" class="table table-hover table-condensed">
	<thead>
	<tr>
		<th>
			Klien ID
		</th>
		<th>
			Nama Klien
		</th>
		<th>
			Jenis Kasus
		</th>
	</tr>
	</thead>
	<tbody>
	@foreach ($klien2 as $klien)
	<tr>
		<td>
			<a href="{{ route('klien.show', $klien->klien_id) }}">
				{{ $klien->klien_id }}
			</a>
		</td>
		<td>
			<a href="{{ route('klien.show', $klien->klien_id) }}">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				{{ $klien->nama_klien }}
			</a>
		</td>
		<td>
			@foreach($klien->klienKasus as $kasus) 
				<a href="{{ route('kasus.show', $kasus->kasus_id) }}">
				<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
				{{ $kasus->jenis_kasus }}
				</a>
			@endforeach
		</td>
	</tr>
	@endforeach
	</tbody>
</table>
