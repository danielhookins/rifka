@extends('layouts.laporan');

@section('content')
<h1>Bentuk Kekerasan</h1>
<Form action="{{ route('laporan.bentukkekerasan') }}" method="POST">
	{{ csrf_field() }}
	Tahun 
	<input name="year" value="{{ $year }}">
	<button type="submit">Update</button>
</Form>
<p>Per Jenis Kasus</p>
<hr>
<table class="table table-condensed table-bordered">
	<thead>
		<th>Jenis Kasus</th>
		@foreach((array_keys($data['KTI'])) as $bentukKekerasan)
			<th>{{ $bentukKekerasan }}</th>
		@endforeach
	</tahead>
	<tbody>
		@foreach($data as $jenisKasus => $count)
			<tr>
				<td>{{ $jenisKasus }}</td>
				@foreach($count as $name => $value)
					<td>{{ $value }}</td>
				@endforeach
			<tr>
		@endforeach
	</tbody>
</table>
@endsection