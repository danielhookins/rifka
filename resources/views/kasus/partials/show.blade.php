<h2>Kasus</h2>

{!! Form::model($kasus, array('class'=>'form-horizontal')) !!}

	@foreach (array_keys($kasus->toArray()) as $attribute)
		
		<div class="form-group">
			{!! Form::label($attribute) !!}
			{!! Form::text($attribute, null, array('class' => 'form-control', 'readonly')) !!}
		</div>
		
	@endforeach

{!! Form::close() !!}