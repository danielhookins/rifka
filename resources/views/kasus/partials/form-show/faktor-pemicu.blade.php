<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="faktor-pemicu">Faktor Pemicu</a>
    </h4>
  </div>

    @forelse ($kasus->faktorPemicu as $pemicu)
    <ul class="list-group">
      <li class="list-group-item">
          <h4 class="list-group-item-heading">Jenis Pemicu</h4>
          <p class="list-group-item-text">{{$pemicu->jenis_pemicu}}</p>
      </li>
      <li class="list-group-item">
          <h4 class="list-group-item-heading">Keterangan</h4>
          <p class="list-group-item-text">{{$pemicu->keterangan}}</p>
      </li>
    </ul>

    <div class="panel-body">
      <div class="form-inline">
        <a class="btn btn-default" href="{{route('kasus.edit', array($kasus->kasus_id, 'faktor-pemicu'))}}">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          Edit
        </a>
      </div>
    </div>
    
    @empty
    <ul class="list-group">
      <li class="list-group-item">
        <a class="tambah-link" href="{{route('kasus.edit', array($kasus->kasus_id, 'informasi-kasus'))}}">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Faktor Pemicu
        </a>
      </li>
    </ul>
    @endforelse

</div> <!-- / Faktor Pemicu Panel -->