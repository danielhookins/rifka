@extends('layouts.records')

@section('content')

<div class="col-sm-8 col-sm-offset-2 well">

	<h2>Perhatian!</h2>
	
	<p>Apakah Anda yakin ingin menghapus kasus ini?</p>

	{!! Form::open(array('route' => array('kasus.destroy', $kasus_id), 'method' => 'delete')) !!}
	    
	    <div class="form-group form-inline">
	    	<a class=" btn btn-default" href="{{route('kasus.show', $kasus_id)}}">Batal</a>
	    	<button class="btn btn-danger" type="submit">Menghapus Kasus</button>
	    </div>

	{!! Form::close() !!}

</div>

@endsection