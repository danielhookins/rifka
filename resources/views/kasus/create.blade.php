@extends('layouts.records')

@section('content')

	<div class="row">
		<h2 style="text-align:center">Kasus Baru</h2>
		<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 well">

		<div class="row">
			<div class="col-sm-12">
				@include('kasus.partials.klien-create',['type' => 'Korban'])
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				@include('kasus.partials.klien-create',['type' => 'Pelaku'])
			</div>
		</div>

		{!! Form::open(array('route' => 'kasus.store')) !!}
		
		<div class="row">
			<div class="col-sm-12">
				@include('kasus.partials.informasi-create')
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">	
			<button type="submit" class="btn btn-primary pull-right" aria-label="OK">
			  <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Membuka Kasus
			</button>
			</div>
		</div>
		
		<div class="row" style="padding-bottom:25px;">
		</div>
		
		{!! Form::close() !!}
	</div>
</div>


@endsection