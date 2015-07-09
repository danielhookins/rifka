<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="narasi">Narasi</a>
    </h4>
  </div>

  <ul class="list-group">
    <li class="list-group-item">
      <p class="list-group-item-text">
      @if($kasus->narasi)
        <strong>Narasi Kasus</strong><br />
        {{$kasus->narasi}}
      @else
        <a class="tambah-link" href="{{route('kasus.edit'), array($kasus->kasus_id, 'narasi')}}">
          Tambah Narasi
        </a>
      @endif
      </p>
  	</li>
  </ul>

	<div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-info" href="{{route('kasus.edit', array($kasus->kasus_id, 'narasi'))}}">Mengedit</a>
      <a class="btn btn-default" href="#">Kembali ke atas</a>
    </div>
  </div>

</div> <!-- / Narasi Panel -->