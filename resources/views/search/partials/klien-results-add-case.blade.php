<table id="datatable" class="table table-hover table-condensed">
 	<thead>
 	<tr>
 		<th># ID</th>
 		<th>Nama</th>
 		<th>Kelamin</th>
 		<th>E-mail</th>
 		<th>No Telp</th>
 		@if(isset($data["results"][0]->kabupaten))
 			<th>Kabupaten</th>
 			<th>Kecamatan</th>
 		@endif
 		<th></th>
 	</tr>
	</thead>
	<tbody>
	@forelse ($data["results"] as $result)
		<tr>
			<td>
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				&nbsp; {{ $result->klien_id }}
			</td>
			<td>
				{{ $result->nama_klien }}
			</td>
			<td>{{ $result->kelamin }}</td>
			<td>{{ $result->email }}</td>
			<td>{{ $result->no_telp }}</td>
			@if(isset($result->kabupaten))
				<td>{{ $result->kabupaten }}</td>
				<td>{{ $result->kecamatan }}</td>
			@endif

			@if($data["referPage"] == "new-case")
				<td><a class="btn btn-primary" href="{{ route('seshPushKlien', array($result->klien_id, $data['type'])) }}">Menambahkan</a></td>
			@elseif($data["referPage"] == "edit-case")
				{!! Form::open(
					array('route' => array('tambah.kasus.klien'), 
					'class'=>'form', 'method' => 'POST')
				)!!}
					<input type="hidden" name="klien_id" value="{{ $result->klien_id }}">
					<input type="hidden" name="kasus_id" value="{{ $data['kasus_id'] }}">
					<td><button class="btn btn-primary" type="submit">Menambahkan</button></td>
				{!! Form::close() !!}	
			@endif
			
		</tr>
		
		@empty
		<td></td>
		<th scope="row"><em>Tidak ada hasil.</em></th>
		<td colspan=2></td>
	
	@endforelse
	</tbody>
</table>