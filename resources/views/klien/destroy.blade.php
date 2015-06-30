@extends('layouts.records')

@section('content')

<div class="col-sm-8 col-sm-offset-2 well">

	<h2>Warning!</h2>

	<p>Are you sure you want to delete this client?</p>

	{!! Form::open(array('route' => array('klien.destroy', $klien_id), 'method' => 'delete')) !!}
	    
	    <div class="form-group form-inline">
	    	<a class=" btn btn-default" href="{{route('klien.show', $klien_id)}}">Cancel</a>
	    	<button class="btn btn-danger" type="submit">Delete Client</button>
	    </div>

	{!! Form::close() !!}

</div>

@endsection