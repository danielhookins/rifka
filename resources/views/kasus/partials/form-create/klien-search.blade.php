<h3>Cari {{$type}}</h3>

{!! Form::open(array('url' => 'klien/search')) !!}
<input name="type" value="{{$type}}" type="hidden">
    <div class="form-group">
    	{!! Form::text('searchQuery', null, array('class' => 'form-control',
                                                'placeholder' => 'Search for client',
                                                'autocomplete' => 'off', 
                                                'autofocus')) !!}
    </div>
    <div class="form-group form-inline">
      {!! Form::radio('kelamin', 'Perempuan') !!} Perempuan 
      {!! Form::radio('kelamin', 'Laki-laki') !!} Laki-laki
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-default form-control" id="search-button">
		  <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search
		</button>
    </div>
{!! Form::close() !!}