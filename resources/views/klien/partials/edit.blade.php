<h2>Klien</h2>

{!! Form::model($klien, array('class'=>'form-horizontal')) !!}
{!! Form::token() !!}

	@foreach (array_keys($klien->toArray()) as $attribute)
		
		<div class="form-group">
			{!! Form::label($attribute) !!}
			{!! Form::text($attribute, null, array('class' => 'form-control')) !!}
		</div>
		
	@endforeach

{!! Form::close() !!}
