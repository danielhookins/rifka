<h2>Cari Klien</h2>

{!! Form::open(array('url' => 'klien/search')) !!}
    <div class="form-group">
    	{!! Form::text('searchQuery', null, array('class' => 'form-control',
                                                'placeholder' => 'Search for client', 'autofocus')) !!}
    </div>
    <div class="form-group hidden-xs" style="padding-top:1px;">
    </div>
    <div class="form-group">
    	{!! Form::submit('Search', array('class' => 'form-control btn btn-default')) !!}
    </div>
{!! Form::close() !!}
