<h3>Cari Klien</h3>

{!! Form::open(array('url' => 'klien/search')) !!}
		
		<div class="form-group">
			{!! Form::text('searchQuery', null, array(
				'class' => 'form-control',
				'placeholder' => 'Cari nama klien',
				'autocomplete' => 'off',
				'autofocus')) !!}
		</div>

		<div class="form-group form-inline">
			{!! Form::radio('kelamin', 'Perempuan') !!} Perempuan 
			{!! Form::radio('kelamin', 'Laki-laki') !!} Laki-laki
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-default form-control" id="search-button">
				<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Penelusuran
			</button>
		</div>
		
{!! Form::close() !!}