<h2 class="main-search-title">Search Database</h2>

{!! Form::open(array('url' => 'search')) !!}
  <div class="form-group">
  	{!! Form::text('searchQuery', null, array('class' => 'form-control',
                                              'placeholder' => 'Search database',
                                              'autocomplete' => 'off',
                                              'autofocus')) !!}
  </div>
  
  <div class="form-group">
    <label for="searchType">Untuk</label>
    {!! Form::select('searchType', array(
      'klien' =>  'Klien', 
      'kasus' =>  'Kasus',
      'alamat' => 'Alamat',
      'arsip' =>  'Arsip'
    ), null, array(
      'class' => 'form-control',
      'id' => 'searchType'
    ))!!}
  </div>

  <div class="form-group">
  	<button type="submit" class="btn btn-success form-control" id="search-button">
	  <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search
	</button>
  </div>
{!! Form::close() !!}