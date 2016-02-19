@extends('layouts.records')

@section('content')

<h3>Hasil Pencarian</h3>
<p>Menampilkan {{ $results->count() }} hasil.</p>

<table class="table table-hover">
	<tr>
		<th>Nama Konselor</th>
	</tr>

	@forelse($results as $result)
	<tr>
		<td>
			<a href="{{ route('konselor.show', $result->konselor_id) }}">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					&nbsp;
					{{$result->nama_konselor}}
				</a>
			</td>
	</tr>

	@empty
	<tr>
		<td>
			Tidak ada hasil. <a href="{{ route('konselor.index') }}">Coba lagi</a>?
		</td>
	</tr>

	@endforelse

</table>

@endsection