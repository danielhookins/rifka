@extends('layouts.records')

@section('content')

	{!! Form::model($kasus, array('route' => array('kasus.update', $kasus->kasus_id), 'class'=>'form-horizontal', 'method' => 'PUT')) !!}

	<h2>Mengedit Kasus</h2>

	@if($section == 'all')
		@include('kasus.partials.form-edit.informasi-kasus')
		
		@include('kasus.partials.form-edit.narasi')

		@include('kasus.partials.form-edit.arsip')

	@else
		@include('kasus.partials.form-edit.'.$section)

	@endif

	<div class="form-inline" style="padding-bottom:10px;">
		<button type="submit" class="btn btn-success">Simpan</button>
		<a href="{{route('kasus.show', $kasus->kasus_id)}}{{($section == 'all' ? '' : '#'.$section)}}" class="btn btn-danger">Cancel</a>
	</div>

	{!! Form::close() !!}

@endsection