@extends('layouts.klien')

@section('content')

	<h2>Laporan</h2>

	<table id="datatable" class="table table-hover table-condensed">
		<thead>
			@foreach($data["selected"] as $header => $name)
				<th>{{ $name }}</th>
			@endforeach
		</thead>
		<tbody>
			@foreach($data["rows"] as $row)
				<tr>
				@foreach(array_keys($data["selected"]) as $attribute)
					<td>
						{{ $row[$attribute] }}
					</td>
				@endforeach
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection	