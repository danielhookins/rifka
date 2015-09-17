<h3>Hasil Pencarian</h3>
<p>Menampilkan {{ Session::get('results')->count() }} hasil</p>

@if(Session::get('results')->count() > 0)
	<p><strong>Silahkan pilih klien:</strong></p>
@endif

<table class="table table-hover">
	<tr>
		<th># ID</th>
		<th>Nama</th>
		<th>Telp</th>
		<th>Alamat</th>
		<th>E-mail</th>
	</tr>
@forelse (Session::get('results') as $result)
	<tr>
		<td>
			<a href="
				@if(Session::get('klienSearch'))
					{{ route('tambah.kasus.klien', array(
						'kasus_id' => $kasus->kasus_id, 
						'klien_id' => $result->klien_id
					)) }}
				@else
				{{ route('seshPushKlien', $result->klien_id) }}/{{ $type }}
				@endif
				">
				{!! $result->klien_id !!}
			</a></td>
		<td>
			<a href="
				@if(Session::get('klienSearch'))
					{{ route('tambah.kasus.klien', array(
						'kasus_id' => $kasus->kasus_id, 
						'klien_id' => $result->klien_id
					)) }}
				@else
				{{ route('seshPushKlien', $result->klien_id) }}/{{ $type }}
				@endif
				">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					&nbsp;
					{!! $result->nama_klien !!}
				</a>
		</td>
		<td>{!! $result->no_telp !!}</td>
		<td>
			<ul>
				@forelse ($result->alamat()->get() as $resultAlamat)
					{{ $resultAlamat->alamat }}
					@if ($resultAlamat->kecamatan)
						<br />{{ $resultAlamat->kecamatan }}
					@endif
					@if ($resultAlamat->kabupaten)
						<br />{{ $resultAlamat->kabupaten }}
					@endif
				@empty
					<li></li>
				@endforelse
			</ul>
		</td>
		<td>{!! $result->email !!}</td>
	</tr>
	@empty
	<td></td>
	<th scope="row"><em>Tidak ada hasil.</em></th>
	<td colspan=3></td>
@endforelse
</table>