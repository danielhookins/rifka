<label><h3>{!! ucfirst($daftar["laporan"]) !!}</h3></label>
{!! Form::select($daftar["laporan"], $daftar["control"]["dropdown"], null, array(
  'class' => 'form-control',
  'id' => $daftar["laporan"]
))!!}