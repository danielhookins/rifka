<div class="container">
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
	{!! Form::submit('Simpan Kasus', array('class' => 'btn btn-success')) !!}
	</div>
</div>
{!! Form::close() !!}