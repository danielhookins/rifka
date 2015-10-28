{!! Form::model($displayModel, array('route' => array('laporan.jenis.list.update'), 
	        'class'=>'form-inline','method' => 'POST')) !!}
	<h3>
		Daftar Kasus
		{!! Form::select('caseType', 
			$displayModel["availableTypes"], 
			null, 
			array(
        'class' => 'form-control',
        'id' => 'caseType'
    )) !!}
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
{!! Form::close() !!}

<table id="datatable" class="table table-hover table-condensed">
	<thead>
	<tr>
		<th>
			Kasus ID
		</th>
		<th>
			Jenis Kasus
		</th>
		<th>
			Klien
		</th>
	</tr>
	</thead>
	<tbody>
	@foreach ($cases as $jenisKasus => $kasusArray)
		@foreach ($kasusArray as $kasus)
			<tr>
				<td>
					<a href="{{ route('kasus.show', $kasus->kasus_id) }}">{{ $kasus->kasus_id }}</a>
				</td>
				<td>{{ $jenisKasus }}</td>
				<td>
					<ul>
					@foreach($kasus->klienKasus()->get() as $klien)
							<li><a href="{{ route('klien.show', $klien->klien_id) }}">{{ $klien->nama_klien }}</a></li>
					@endforeach
					</ul>
				</td>	
			</tr>
		@endforeach
	@endforeach
	</tbody>
</table>
