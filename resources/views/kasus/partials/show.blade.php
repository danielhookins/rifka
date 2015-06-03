<h2>Kasus</h2>

{!! Form::model($kasus, array('class'=>'form-horizontal')) !!}

	@foreach (array_keys($kasus->toArray()) as $attribute)
		
		<div class="form-group">
			{!! Form::label($attribute) !!}
			{!! Form::text($attribute, null, array('class' => 'form-control', 'readonly')) !!}
		</div>
		
	@endforeach

{!! Form::close() !!}

<h3>Arsip Kasus</h3>
	<table border="1">
		<tr>
			<th style="padding:5px;">No Reg</th>
			<th style="padding:5px;">Lokasi</th>
			<th colspan=2></th>
		</tr>
		
		@foreach ($arsip2 as $arsip)
			<tr>
				<td style="padding:5px;">{{ $arsip->no_reg }}</td>
				<td style="padding:5px;">{{ $arsip->lokasi }}</td>
				<td style="padding:5px;">[Edit]</td>
				<td style="padding:5px;">[Delete]</td>
			</tr>
		@endforeach

		<tr>
			<td colspan=2 style="padding:5px;">Arsip Baru</td>
		</tr>
	</table>