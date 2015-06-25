<h2>Kasus Baru</h2>

<div class="row">
	{!! (Session::has('korbanSearch')) ? '<div class="col-sm-12">' : '<div class="col-sm-6">' !!}
	@include('kasus.partials.form-create.klien-panel',['type' => 'Korban'])
	</div>

	{!! (Session::has('pelakuSearch')) ? '<div class="col-sm-12">' : '<div class="col-sm-6">' !!}
	@include('kasus.partials.form-create.klien-panel',['type' => 'Pelaku'])
	</div>
</div>

{!! Form::open(array('route' => 'kasus.store')) !!}
<div class="row">
	<div class="col-sm-12">
		@include('kasus.partials.form-create.informasi-panel')
	</div>
</div>

<div class="row">
	<div class="col-sm-12">	
	<button type="submit" class="btn btn-success pull-right" aria-label="OK">
	  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Simpan Kasus
	</button>
	</div>
</div>
<div class="row" style="padding-bottom:25px;">
</div>
{!! Form::close() !!}