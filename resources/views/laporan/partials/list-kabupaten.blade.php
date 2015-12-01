{!! Form::model($displayModel, array('route' => array('laporan.kabupaten.list.update'), 
	        'class'=>'form-inline','method' => 'POST')) !!}
	<h3>
		Alamat Kasus untuk tahun 
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
		<th>Kasus ID</th>
		<th>Jenis Kasus</th>
		<th>Kabupaten</th>
		<th>Kecamatan</th>
		<th>Alamat</th>
	</tr>
	</thead>
	<tbody>
	@foreach ($rows as $row)
		<tr>
			<td>
				<a href="{{ route('kasus.show', $row["kasus_id"]) }}">{{ $row["kasus_id"] }}</a>
			</td>
			<td>{{ $row["jenis_kasus"] }}</td>
			<td>{{ $row["kabupaten"] }}</td>	
			<td>{{ $row["kecamatan"] }}</td>
			<td>{{ $row["alamat"] }}</td>
		</tr>
	@endforeach
	</tbody>
</table>
