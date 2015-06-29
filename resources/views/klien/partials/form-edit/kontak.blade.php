<div class="panel panel-warning">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="informasi-kontak">Informasi Kontak</a>
    </h4>
  </div>

  <ul class="list-group">
  	<li class="list-group-item">
  		<h4 class="list-group-item-heading">Nomor Telepon</h4> 
  		<div class="list-group-item-text">{!! Form::text('no_telp', null, array('class' => 'form-control')) !!}</div>
  	</li>
  	<li class="list-group-item">
  		<h4 class="list-group-item-heading">Alamat</h4> 
  		<p class="list-group-item-text">
  			<ul>
    			<li>
    				@if(isset($alamat2))
	    				@foreach ($alamat2 as $alamat)
								<div class="list-group-item-text">{!! Form::text('alamat', null, array('class' => 'form-control')) !!}</div>
								<div class="list-group-item-text">{!! Form::text('kecamatan', null, array('class' => 'form-control')) !!}</div>
								<div class="list-group-item-text">{!! Form::text('kabupaten', null, array('class' => 'form-control')) !!}</div>
							@endforeach
						@endif
					</li>
    		</ul>
  		</p>
  	</li>
    <li class="list-group-item">
  		<h4 class="list-group-item-heading">Email</h4> 
  		<div class="list-group-item-text">{!! Form::text('email', null, array('class' => 'form-control')) !!}</div>
  	</li>
  </ul>
</div> <!-- /Kontak Panel -->