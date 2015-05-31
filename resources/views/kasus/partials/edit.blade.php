<h2>Kasus</h2>

{!! Form::model($kasus, array('class'=>'form-horizontal')) !!}
{!! Form::token() !!}

	@foreach (array_keys($kasus->toArray()) as $attribute)
		
		<div class="form-group">
			{!! Form::label($attribute) !!}
			{!! Form::text($attribute, null, array('class' => 'form-control')) !!}
		</div>
		
	@endforeach

{!! Form::close() !!}