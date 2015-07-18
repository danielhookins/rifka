<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="narasi">Narasi</a>
    </h4>
  </div>

  @if($kasus->narasi)
  <ul class="list-group">
    <li class="list-group-item">
      <p class="list-group-item-text">
        <strong>Narasi Kasus</strong><br />
        {{$kasus->narasi}}
      </p>
    </li>
  </ul>

  <div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-default" href="{{route('kasus.edit', array($kasus->kasus_id, 'narasi'))}}">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        Edit
      </a>
    </div>
  </div>

  @else
  <ul class="list-group">
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" href="{{route('kasus.edit'), array($kasus->kasus_id, 'narasi')}}">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Narasi
        </a>
      </p>
    </li>
  </ul>
  @endif

</div> <!-- / Narasi Panel -->