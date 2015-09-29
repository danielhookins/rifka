<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Informasi Kasus</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			
			<div class="col-sm-12">
				
				<div class="form-group">
					{!! Form::label('hubungan', 'Hubungan', array('class' => 'strongLabel')) !!}
					{!! Form::text('hubungan', null, array(
						'class' 		=> 'form-control',
						'placeholder' 	=> 'Hubungan', 
						'autocomplete' => 'off'
					))
					!!}
				</div>

				<div class="form-group">
					{!! Form::label('lama_hubungan', 'Lama Hubungan', array('class' => 'strongLabel')) !!}
					<div class="form-inline">
					{!! Form::number('lama_hubungan', null, array(
						'class' 		=> 'form-control',
						'placeholder' 	=> 'Lama Hubungan', 
						'autocomplete' => 'off'
					))
					!!}
					{!! Form::select('jenis_lama_hub', array(
						'Hari' 		=>	'Hari',
						'Bulan'				=>  'Bulan',
						'Tahun'				=>	'Tahun'
					), null, array('class' => 'form-control'))!!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('jenis_kasus', 'Jenis Kasus', array('class' => 'strongLabel')) !!}
					{!! Form::select('jenis_kasus', array(
						'Jenis' 		=>	'Jenis',
						'KTI'				=>  'KTI',
						'KDP'				=>	'KDP',
						'Perkosaan' =>	'Perkosaan',
						'Pel-Seks'	=>	'Pel-Seks',
						'KDK'				=>	'KDK',
						'Lain'			=>	'Lain'
					), null, array('class' => 'form-control'))!!}
				</div>

			</div>
		</div>
	</div>
</div>