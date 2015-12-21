@extends('layouts.records')

@section('content')

	{{ $tableData["Sleman"]["Dewasa"]["KTI"] }}
	@foreach($tableData as $kabupaten => $kabData)

		<h3>{{ $kabupaten }}</h3>
		<table class="table table-condensed table-hover">
			<thead>
				<th>Usia</th>
				<th>KTI</th>
			</thead>
			@foreach($kabData as $usia => $usiaData)
				<tbody>
					<tr>
						<td>{{ $usia }}</td>
						<td>{{ $usiaData["KTI"] }}</td>
					</tr>
				</tbody>
			@endforeach
		</table>

	@endforeach

@endsection