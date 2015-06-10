<h2>Cari Klien</h2>

{!! Form::open(array('url' => 'klien/search')) !!}
    <div class="form-group">
    	{!! Form::text('searchQuery', null, array('class' => 'form-control',
                                                'placeholder' => 'Search for client', 'autofocus')) !!}
    </div>
    <div class="form-group hidden-xs" style="padding-top:1px;">
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-default form-control">
		  <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search
		</button>
    </div>
{!! Form::close() !!}
