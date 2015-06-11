<h2>Cari Kasus</h2>

{!! Form::open(array('url' => 'kasus/search')) !!}
    <div class="form-group">
    	{!! Form::text('searchQuery', null, array('class' => 'form-control',
                                                'placeholder' => 'Search for case', 'autofocus')) !!}
    </div>
    <div class="form-group hidden-xs" style="padding-top:1px;">
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-default form-control" id="search-button">
		  <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search
		</button>
    </div>
{!! Form::close() !!}