<h2>Klien</h2>

{!! Form::model($klien, array('class'=>'form-horizontal')) !!}

	@foreach (array_keys($klien->toArray()) as $attribute)
		
		<div class="form-group">
			{!! Form::label($attribute) !!}
			{!! Form::text($attribute, null, array('class' => 'form-control', 'readonly')) !!}
		</div>
		
	@endforeach

{!! Form::close() !!}
