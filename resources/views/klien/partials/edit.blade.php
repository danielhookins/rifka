{!! Form::model($klien, array('route' => array('klien.update', $klien->klien_id), 'class'=>'form-horizontal', 'method' => 'PUT')) !!}
<h2>Mengedit Klien</h2>

	@include('klien.partials.form-edit.pribadi')

	@include('klien.partials.form-edit.kontak')

	@include('klien.partials.form-edit.informasi')

<div class="form-group form-inline">
	<button type="submit" class="btn btn-success">Simpan</button>
	<a href="{{route('klien.show', $klien->klien_id)}}" class="btn btn-danger">Cancel</a>
</div>
{!! Form::close() !!}