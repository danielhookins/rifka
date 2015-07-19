<div class="panel panel-warning">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="informasi-kasus">Informasi Kasus</a>
    </h4>
  </div>

  <ul class="list-group">
    
    <li class="list-group-item">
    	<h4 class="list-group-item-heading">Kasus ID</h4>
    	<p class="list-group-item-text">{{$kasus->kasus_id}}</p>
  	</li>
  	
  	<li class="list-group-item">
    	<h4 class="list-group-item-heading">Jenis Kasus</h4>
    	<p class="list-group-item-text">
    		{!! Form::select('jenis_kasus', array(
					'Jenis' 		=>	'Jenis',
					'KTI'				=>  'KTI',
					'KDP'				=>	'KDP',
					'Perkosaan' =>	'Perkosaan',
					'Pel-Seks'	=>	'Pel-Seks',
					'KDK'				=>	'KDK',
					'Lain'			=>	'Lain'
				), null, array('class' => 'form-control'))!!}
    	</p>
  	</li>
  	
  	<li class="list-group-item">
    	<h4 class="list-group-item-heading">Hubungan</h4>
				{!! Form::label('hubungan', 'Hubungan', array('class' => 'strongLabel')) !!}
				{!! Form::text('hubungan', null, array(
					'class' 		=> 'form-control',
					'placeholder' 	=> 'Hubungan'))!!}
				{!! Form::label('lama_hubungan', 'Lama Hubungan', array('class' => 'strongLabel')) !!}
				<div class="form-inline">
				{!! Form::number('lama_hubungan', null, array(
					'class' 		=> 'form-control',
					'placeholder' 	=> 'Lama Hubungan'))!!}
				{!! Form::select('lama_hub_jenis', array(
					'Hari' 	=>	'Hari',
					'Bulan'	=>  'Bulan',
					'Tahun'	=>	'Tahun'), 
					null, array('class' => 'form-control'))!!}
				</div>
  	</li>

  	<li class="list-group-item">
  		<h4 class="list-group-item-heading">Kekerasan</h4>
				{!! Form::label('sejak_kapan', 'Sejak Kapan', array('class' => 'strongLabel')) !!}
				{!! Form::date('sejak_kapan', $kasus->sejak_kapan, array('class' => 'form-control')) !!}

				{!! Form::label('seberapa_sering', 'Seberapa Sering', array('class' => 'strongLabel')) !!}
				{!! Form::number('seberapa_sering', $kasus->seberapa_sering, array('class' => 'form-control')) !!}
		</li>

		<li class="list-group-item">
  		<h4 class="list-group-item-heading">Korban</h4>
				{!! Form::label('harapan_korban', 'Harapan Korban', array('class' => 'strongLabel')) !!}
				{!! Form::text('harapan_korban', null, array(
					'class' 		=> 'form-control',
					'placeholder' 	=> 'Harapan Korban'
				))
				!!}

				{!! Form::label('rencana_korban', 'Rencana Korban', array('class' => 'strongLabel')) !!}
				{!! Form::text('rencana_korban', null, array(
					'class' 		=> 'form-control',
					'placeholder' 	=> 'Rencana Korban Selanjutnya'
				))
				!!}
			</li>
  
  </ul>

</div>