{!! Form::open(array('route' => array('laporan.tahun.list.update'), 
	        'class'=>'form','method' => 'POST')) !!}
	<h3>
		Daftar Kasus Baru  
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

<table class="table table-hover table-condensed">
	<tr>
		<th>
			Kasus ID
		</th>
		<th>
			Jenis Kasus
		</th>
		<th>
			Hubungan
		</th>
		<th>
			Klien
		</th>
	</tr>
	@foreach ($cases as $kasus)
	<tr>
		<td><a href="{{ route('kasus.show', $kasus->kasus_id) }}">{{ $kasus->kasus_id }}</a></td>
		<td>{{ $kasus->jenis_kasus }}</td>
		<td>{{ $kasus->hubungan }}</td>
		<td>
			<ul>
			@foreach($kasus->klienKasus()->get() as $klien)
					<li><a href="{{ route('klien.show', $klien->klien_id) }}">{{ $klien->nama_klien }}</a></li>
			@endforeach
			</ul>
		</td>	
	</tr>
	@endforeach
</table>