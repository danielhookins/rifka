@extends('layouts.records')

@section('content')

@if(Session::has('konselorMsgs'))
	<div class="alert alert-info alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	  <strong>Perhatian</strong>
	  <ul>
		  @foreach(Session::get('konselorMsgs') as $msg) 
		  	<li>{{ $msg }}</li>
		  @endforeach
	  </ul>
	</div>
@endif

<div class="panel panel-default">
  
  <div class="panel-heading">
    <h3 class="panel-title">
      Konselor
    </h3>
  </div>

  <ul class="list-group">
    <li class="list-group-item">
      <p class="list-group-item-text">
        <strong>Konselor ID: </strong>
        {{ $konselor->konselor_id }}
      </p>
    </li>
    <li class="list-group-item">
      <p class="list-group-item-text">
        <strong>Nama Konselor: </strong>
        {{ $konselor->nama_konselor }}
      </p>
    </li>
    <li class="list-group-item">
      <p class="list-group-item-text">
        <strong>User ID: </strong>
        {{ $konselor->user_id or 'bukan user' }}
      </p>
    </li>
  </ul>

  <div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-default" href="{{ route('konselor.index') }}">
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
        Daftar
      </a>
      <a class="btn btn-default" href="{{ route('konselor.edit', $konselor->
      konselor_id) }}">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        Edit
      </a>
    </div>
  </div>

	<div class="panel-heading">
	    <h3 class="panel-title">
	      Kasus
	    </h3>
	</div>

	@forelse ($konselor->kasus()->get() as $kasus)
		
		<li class="list-group-item">
      <p class="list-group-item-text">
        <a href="{{ route('kasus.show', $kasus->kasus_id) }}">
        	<span class="glyphicon glyphicon-folder-open" aria-hidden="true" href=""></span> &nbsp; Kasus #{{ $kasus->kasus_id }} &nbsp; {{ $kasus->jenis_kasus }} &nbsp; {{ $kasus->updated_at }}
        </a>
      </p>
    </li>

	@empty
		<li class="list-group-item">
      <p class="list-group-item-text">
        Belum ada kasus.
      </p>
    </li>
	@endforelse
	
</div>

@endsection