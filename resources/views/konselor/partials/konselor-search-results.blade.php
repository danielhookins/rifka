<h3>Search Results</h3>

<p>Search for "{{ Session::get('query') }}" found {{ Session::get('results')->count() }} results</p>

<table class="table table-hover">
	<tr>
		<th># ID</th>
		<th>Nama</th>
	</tr>

	@forelse(Session::get('results') as $result)
	<tr>
		<td>
			<a href="{{ route('tambah.kasus.konselor', array(
						'kasus_id' => $kasus->kasus_id, 
						'konselor_id' => $result->konselor_id
					)) }}">
					{{$result->konselor_id}}
				</a>
			</td>
		<td>
			<a href="{{ route('tambah.kasus.konselor', array(
						'kasus_id' => $kasus->kasus_id, 
						'konselor_id' => $result->konselor_id
					)) }}">
					{{$result->nama_konselor}}
				</a>
			</td>
	</tr>

	@empty

	@endforelse

</table>