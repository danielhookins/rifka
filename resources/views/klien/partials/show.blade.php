<h2>Klien</h2>

{!! Form::model($klien, array('class'=>'form-horizontal')) !!}

	@foreach (array_keys($klien->toArray()) as $attribute)
		
		<div class="form-group">
			{!! Form::label($attribute) !!}
			{!! Form::text($attribute, null, array('class' => 'form-control', 'readonly')) !!}
		</div>
		
	@endforeach

	<h3>Alamat Klien</h3>
	<table border="1">
		<tr>
			<th style="padding:5px;">Alamat</th>
			<th style="padding:5px;">Kecamatan</th>
			<th style="padding:5px;">Kabupaten</th>
			<th colspan=2></th>
		</tr>
		
		@foreach ($alamat2 as $alamat)
			<tr>
				<td style="padding:5px;">{{ $alamat->alamat }}</td>
				<td style="padding:5px;">{{ $alamat->kecamatan }}</td>
				<td style="padding:5px;">{{ $alamat->kabupaten }}</td>
				<td style="padding:5px;">[Edit]</td>
				<td style="padding:5px;">[Delete]</td>
			</tr>
		@endforeach
		
		<tr>
			<td colspan=2 style="padding:5px;">Alamat Baru</td>
		</tr>
	</table>

	<h3>Klien Kasus</h3>
	<table border="1">
		<tr>
			<th style="padding:5px;">Kasus ID</th>
			<th style="padding:5px;">Jenis Klien</th>
			<th style="padding:5px;">Jenis Kasus</th>
			<th style="padding:5px;">Tanggal</th>
		</tr>
		
		@foreach ($kasus2 as $kasus)
			<tr>
				<td style="padding:5px;"><a href="../kasus/{{ $kasus->kasus_id }}">{{ $kasus->kasus_id }}</a></td>
				<td style="padding:5px;">{{ $kasus->pivot->jenis_klien }}</td>
				<td style="padding:5px;">{{ $kasus->jenis_kasus }}</td>
				<td style="padding:5px;">{{ $kasus->created_at }}</td>
			</tr>
		@endforeach

		<tr>
			<td colspan=2 style="padding:5px;">Kasus Baru</td>
		</tr>
	</table>

{!! Form::close() !!}