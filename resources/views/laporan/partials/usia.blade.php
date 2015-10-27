<div class="row">
<div class="col-sm-12">
	<h1>Laporan Usia</h1>
	
	{!! Form::open(array('route' => array('kasusOlehUsia.xls'),
		'class'=>'form form-inline well', 'method' => 'POST')) !!}
		<h3>Expor data usia ke Excel</h3>
		<label for="mulai">Tahun Mulai</label>
		<input class="form-control" name="mulai" placeholder="Tahun Mulai" />
		<label for="sampai">Tahun Sampai</label>
		<input class="form-control" name="sampai" placeholder="Tahun Sampai" />
		<button type="submit">
			<span class="glyphicon glyphicon-download" aria-hidden="true"></span>
			Download
		</button>
	{!! Form::close() !!}

	{!! Form::open(array('route' => array('laporan.usia.update'), 
	        'class'=>'form','method' => 'POST')) !!}
		<h3>
			Jumlah kasus oleh usia korban untuk tahun 
			<button class="btn btn-default" type="submit" name="change" value="prev">
				<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
			</button>
			<input style="width:70px;text-align:center" autocomplete="off" id="year" name="year" value="{{ $year }}">
			<button class="btn btn-default" @if($year == Carbon\Carbon::today()->format('Y')) disabled @endif type="submit" name="change" value="next">
				<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
			</button>
			<button class="btn btn-default" type="submit">Update</button>
		</h3>
	{!! Form::close() !!}

<table class="table table-hover">
	<tr>
		<th>Usia</th>
		<th style="background-color:#b6cedf;">Jumlah Kasus</th>
		@foreach($typeCases as $key => $value)
		<th>{{ $key }}</th>
		@endforeach
	</tr>
	<tr>
		<td>Anak Kecil (Usia < 12)</td>
		<td style="background-color:#cbe5f8;">{{ count($usia["anakKecil"]) }}</td>
		@foreach($typeCases as $key => $value)
		<td>{{ count($value["anakKecil"]) }}</td>
		@endforeach
	</tr>
	<tr>
		<td>Remaja (Usia 12-15)</td>
		<td style="background-color:#cbe5f8;">{{ count($usia["remaja12sd15"]) }}</td>
		@foreach($typeCases as $key => $value)
		<td>{{ count($value["remaja12sd15"]) }}</td>
		@endforeach
	</tr>
	<tr>
		<td>Remaja (Usia 16-17)</td>
		<td style="background-color:#cbe5f8;">{{ count($usia["remaja16sd17"]) }}</td>
		@foreach($typeCases as $key => $value)
		<td>{{ count($value["remaja16sd17"]) }}</td>
		@endforeach
	</tr>
	<tr>
		<td>Dewasa (Usia 18+)</td>
		<td style="background-color:#cbe5f8;">{{ count($usia["dewasa"]) }}</td>
		@foreach($typeCases as $key => $value)
		<td>{{ count($value["dewasa"]) }}</td>
		@endforeach
	</tr>
</table>

</div>

<div class="col-sm-12">
</div>

</div>