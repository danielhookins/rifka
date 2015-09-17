@extends('layouts.records')

@section('content')
	
	<h2>Hasil Pencarian</h2>
	<p>Menampilkan {{ $results->count() }} hasil untuk "{{ $query }}"</p>

	<table class="table table-hover">
 	<tr>
 		<th>Alamat</th>
 		<th>Kecamatan</th>
 		<th>Kabupaten</th>
 		<th>Klien</th>
 	</tr>
	@forelse ($results as $result)
		<tr>
			<td>{{ $result->alamat }}</td>
			<td>{{ $result->kecamatan }}</td>
			<td>{{ $result->kabupaten }}</td>
			<td>
				<ul class="no-bullets">
					@forelse ($result->klien()->get() as $resultKlien)
						<li>
							<a href="{{ route('klien.index') }}/{{ $resultKlien->klien_id }}">
								<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
								&nbsp;
								{{ $resultKlien->nama_klien }}
							</a>
						</li>
					@empty
						<li>Tidak ada klien.</li>
					@endforelse
				</ul>
			</td>
		</tr>
		@empty
		<td></td>
		<th scope="row"><em>Tidak ada hasil.</em></th>
		<td colspan=3></td>
	@endforelse
	</table>

@endsection