@extends('layouts.records')

@section('content')

	{!! Form::model($klien, array('route' => array('klien.update', $klien->klien_id), 'class'=>'form-horizontal', 'method' => 'PUT')) !!}

	<h2>Mengedit Klien</h2>

	@if($section == 'all')
		@include('klien.partials.form-edit.pribadi')

		@include('klien.partials.form-edit.kontak')

		@include('klien.partials.form-edit.tambahan')

	@else
		@include('klien.partials.form-edit.'.$section)

	@endif

	<div class="form-inline" style="padding-bottom:10px;">
		<button type="submit" class="btn btn-success">Simpan</button>
		<a href="{{route('klien.show', $klien->klien_id)}}{{($section == 'all' ? '' : '#informasi-'.$section)}}" class="btn btn-danger">Cancel</a>
	</div>

	{!! Form::close() !!}

@endsection