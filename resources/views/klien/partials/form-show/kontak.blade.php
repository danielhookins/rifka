<div class="panel panel-default">
	
	<div class="panel-heading">
		<h4 class="panel-title">
			<a class="in-link" name="informasi-kontak">Informasi Kontak</a>
		</h4>
	</div>

	<ul class="list-group">
		@if ($klien->no_telp || (count($alamat2) && $alamat2[0]->alamat) || $klien->email)
			
			@if ($klien->no_telp)
			<li class="list-group-item">
				<h4 class="list-group-item-heading">Nomor Telepon</h4> 
				<p class="list-group-item-text">{{$klien->no_telp}}</p>
			</li>
			@endif
			
			@if (count($alamat2) && $alamat2[0]->alamat)
			<li class="list-group-item">
				<h4 class="list-group-item-heading">Alamat</h4> 
				<p class="list-group-item-text">
					<ul>
						<li>
							@foreach ($alamat2 as $alamat)
								{{ $alamat->alamat }}
								<br />{{ $alamat->kecamatan }}
								<br />{{ $alamat->kabupaten }}
							@endforeach
						</li>
					</ul>
				</p>
			</li>
			@endif
			
			@if($klien->email)
			<li class="list-group-item">
				<h4 class="list-group-item-heading">Email</h4> 
				<p class="list-group-item-text"><a href="mailto:{{$klien->email}}">{{$klien->email}}</a></p>
			</li>
			@endif	
		
		@endif
	
	</ul>

	<div class="panel-body">
		<div class="form-inline">
			<a class="btn btn-info" href="{{route('klien.edit', array($klien->klien_id, 'kontak'))}}">Mengedit</a>
			<a class="btn btn-default" href="#">Kembali ke atas</a>
		</div>
	</div>

</div>