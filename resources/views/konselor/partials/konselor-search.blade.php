<h3>Cari Konselor</h3>

{!! Form::open(array('url' => route('konselor.search'), 'method' => 'post')) !!}
    <div class="form-group">
    	{!! Form::text('search_query', null, array(
            'class' => 'form-control',
            'placeholder' => 'Search for counsellor', 
            'autofocus')) 
        !!}
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-default form-control" id="search-button">
		  <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search
		</button>
    </div>
{!! Form::close() !!}