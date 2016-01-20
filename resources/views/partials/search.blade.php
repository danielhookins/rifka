<?php if(!isset($user)){$user=Auth::User();} ?>

<h2 class="main-search-title">Penelusuran Database</h2>

{!! Form::open(array('url' => 'search')) !!}
  <div class="form-group">
  	{!! Form::text('searchQuery', null, array('class' => 'form-control',
                                              'placeholder' => 'Penelusuran database',
                                              'autocomplete' => 'off',
                                              'autofocus')) !!}
  </div>
  
  <div class="form-group">
    <label for="searchType">Untuk</label>
    @if(isset($user) && $user->jenis != "Front Office")
      {!! Form::select('searchType', array(
        'klien' =>  'Klien', 
        'kasus' =>  'Kasus',
        'arsip' =>  'Arsip',
        'alamat' => 'Alamat'
      ), null, array(
        'class' => 'form-control',
        'id' => 'searchType'
      ))!!}
    @else
      {!! Form::select('searchType', array(
        'klien' =>  'Klien', 
      ), null, array(
        'class' => 'form-control',
        'id' => 'searchType'
      ))!!}
    @endif
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-success form-control" id="search-button">
      <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Penelusuran
    </button>
  </div>

{!! Form::close() !!}