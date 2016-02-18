<?php if(!isset($user)){$user=Auth::User();} ?>

<h2 class="main-search-title">Penelusuran Database</h2>

{!! Form::open(array('url' => 'search')) !!}
<input name="searchType" value="general" type="hidden">

  <div class="form-group">
  	{!! Form::text('queryInput', null, array('class' => 'form-control',
                                              'placeholder' => 'Penelusuran database',
                                              'autocomplete' => 'off',
                                              'autofocus')) !!}
  </div>
  
  <div class="form-group">
    <label for="searchType">Untuk</label>
    @if(isset($user) && $user->jenis != "Front Office")
      {!! Form::select('queryType', array(
        'nama_klien' =>  'Nama Klien',
        'no_reg' =>  'Nomor Arsip'
      ), null, array(
        'class' => 'form-control',
        'id' => 'queryType'
      ))!!}
    @else
      {!! Form::select('queryType', array(
        'nama_klien' =>  'Klien', 
      ), null, array(
        'class' => 'form-control',
        'id' => 'queryType'
      ))!!}
    @endif
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-success form-control" id="search-button">
      <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Penelusuran
    </button>
  </div>

{!! Form::close() !!}