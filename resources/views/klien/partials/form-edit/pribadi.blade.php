<div class="panel panel-warning">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="informasi-pribadi">Informasi Pribadi</a>
    </h4>
  </div>

  <ul class="list-group">
    <li class="list-group-item">
	    	<h4 class="list-group-item-heading">Klien ID</h4>
	    	<p class="list-group-item-text">{{$klien->klien_id}}</p>
  	</li>
  	<li class="list-group-item">
	    	<h4 class="list-group-item-heading">Nama</h4>
	    	<div class="list-group-item-text">{!! Form::text('nama_klien', null, array('class' => 'form-control')) !!}</div>
  	</li>
  	<li class="list-group-item">
	    	<h4 class="list-group-item-heading">Kelamin</h4>
	    	<div class="form-inline list-group-item-text">
					{!! Form::radio('kelamin', 'Perempuan') !!} Perempuan 
					{!! Form::radio('kelamin', 'Laki-laki') !!} Laki-laki
				</div>
  	</li>
  	<li class="list-group-item">
	    	<h4 class="list-group-item-heading">Tanggal Lahir</h4>
	    	<div class="list-group-item-text">{!! Form::date('tanggal_lahir', null, array('class' => 'form-control date-picker')) !!}</div>
  	</li>
  	<li class="list-group-item">
	    	<h4 class="list-group-item-heading">Agama</h4>
	    	<div class="list-group-item-text">{!! Form::select('agama', array(
					'Agama' 		=>	'Agama', 
					'Islam' 		=>	'Islam', 
					'Protestan' 	=>	'Protestan', 
					'Katolik' 		=>	'Katolik', 
					'Hindu' 		=>	'Hindu', 
					'Buddha' 		=>	'Buddha', 
					'Kong Hu Cu' 	=>	'Kong Hu Cu', 
					'Lain'			=>	'Lain'
				), null, array('class' => 'form-control'))!!}</div>
  	</li>
  	<li class="list-group-item">
	    	<h4 class="list-group-item-heading">Status Perkawinan</h4>
	    	<div class="list-group-item-text">{!! Form::select('status_perkawinan', array(
					'Status Perkawinan' =>	'Status Perkawinan', 
					'Belum Menikah' 	=>	'Belum Menikah', 
					'Menikah' 			=>	'Menikah', 
					'Cerai' 			=>	'Cerai', 
					'Janda'				=>	'Janda'
				), null, array('class' => 'form-control'))!!}</div>
  	</li> 
  </ul>
</div> <!-- /Pribadi Panel -->