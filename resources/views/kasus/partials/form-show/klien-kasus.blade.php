<div class="panel panel-primary">

<div class="panel-heading">
  <h4 class="panel-title">
    <a class="in-link" name="klien-kasus">
      <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
      Klien
    </a>
  </h4>
</div>

<ul class="list-group">
  @forelse ($kasus->klienKasus as $klien)
    <li class="list-group-item"><a href="{!! route('klien.index') !!}/{{ $klien->klien_id }}">{{ $klien->nama_klien }}</a>
    ({{$klien->pivot->jenis_klien}})
  @empty
    <li class="list-group-item">
      <a class="tambah-link" href="#">
        Tambah Klien
      </a>
    </li>
  @endforelse
</ul>

	<div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-info" href="#">Mengedit</a>
    </div>
  </div>

</div>