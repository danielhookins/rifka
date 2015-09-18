<h3>Hasil Pencarian</h3>
<p>Menampilkan {{ Session::get('results')->count() }} hasil untuk "{{ Session::get('query') }}"</p>

<table class="table table-hover">
	<tr>
		<th>Nama Konselor</th>
	</tr>

	@forelse(Session::get('results') as $result)
	<tr>
		<td>
			<a href="{{ route('tambah.kasus.konselor', array(
						'kasus_id' => $kasus->kasus_id, 
						'konselor_id' => $result->konselor_id
					)) }}">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					&nbsp;
					{{$result->nama_konselor}}
				</a>
			</td>
	</tr>

	@empty
	<tr>
		<td>
			Tidak ada hasil. Mau tambah di tempat <a href="{{ route('konselor.index') }}" target="_blank">Manajemen Konselor</a>?
		</td>
	</tr>

	@endforelse

</table>