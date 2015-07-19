<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Informasi Kasus</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			
			<div class="col-sm-6">
				
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
				
				<div class="form-group">
					{!! Form::label('hubungan', 'Hubungan', array('class' => 'strongLabel')) !!}
					{!! Form::text('hubungan', null, array(
						'class' 		=> 'form-control',
						'placeholder' 	=> 'Hubungan'
					))
					!!}
				</div>


				<div class="form-group">
					{!! Form::label('lama_hubungan', 'Lama Hubungan', array('class' => 'strongLabel')) !!}
					<div class="form-inline">
					{!! Form::number('lama_hubungan', null, array(
						'class' 		=> 'form-control',
						'placeholder' 	=> 'Lama Hubungan'
					))
					!!}
					{!! Form::select('lama_hub_jenis', array(
						'Hari' 		=>	'Hari',
						'Bulan'				=>  'Bulan',
						'Tahun'				=>	'Tahun'
					), null, array('class' => 'form-control'))!!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('sejak_kapan', 'Sejak Kapan', array('class' => 'strongLabel')) !!}
					{!! Form::date('sejak_kapan', null, array('class' => 'form-control')) !!}
				</div>

				<div class="form-group">
					{!! Form::label('seberapa_sering', 'Seberapa Sering', array('class' => 'strongLabel')) !!}
					{!! Form::number('seberapa_sering', null, array('class' => 'form-control')) !!}
				</div>

				<div class="form-group">
					{!! Form::label('harapan_korban', 'Harapan Korban', array('class' => 'strongLabel')) !!}
					{!! Form::text('harapan_korban', null, array(
						'class' 		=> 'form-control',
						'placeholder' 	=> 'Harapan Korban'
					))
					!!}
				</div>

				<div class="form-group">
					{!! Form::label('rencana_korban', 'Rencana Korban', array('class' => 'strongLabel')) !!}
					{!! Form::text('rencana_korban', null, array(
						'class' 		=> 'form-control',
						'placeholder' 	=> 'Rencana Korban Selanjutnya'
					))
					!!}
				</div>

			</div>
			<div class="col-sm-6">
				<div class="form-group">
					{!! Form::label('narasi', 'Narasi', array('class' => 'strongLabel')) !!}
					<textarea name="narasi" class="form-control" placeholder="Narasi Kasus" rows="23"></textarea>
				</div>
			</div>
		</div>
	</div>
</div>