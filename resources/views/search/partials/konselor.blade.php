<h3>Cari Konselor</h3>

{!! Form::open(array('url' => route('search.konselor'), 'method' => 'post')) !!}
<input name="searchType" value="konselor" type="hidden">

  <div class="form-group">
  	{!! Form::text('nama_konselor', null, array(
          'class' => 'form-control',
          'placeholder' => 'Cari Konselor',
          'autocomplete' => 'off',
          'autofocus')) 
      !!}
  </div>

  @include('search.partials.btn-penelusuran')
    
{!! Form::close() !!}