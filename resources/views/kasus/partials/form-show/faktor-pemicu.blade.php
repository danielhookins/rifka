<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="faktor-pemicu">Faktor Pemicu</a>
    </h4>
  </div>

  <ul class="list-group">
    @forelse ($kasus->faktorPemicu as $pemicu)
    <li class="list-group-item">
        <h4 class="list-group-item-heading">Jenis Pemicu</h4>
        <p class="list-group-item-text">{{$pemicu->jenis_pemicu}}</p>
    </li>
    <li class="list-group-item">
        <h4 class="list-group-item-heading">Keterangan</h4>
        <p class="list-group-item-text">{{$pemicu->keterangan}}</p>
    </li>
    
    @empty
    <li class="list-group-item">
        <p class="list-group-item-text">Tidak ada faktor pemicu untuk kasus ini.</p>
    </li>

    @endforelse
  </ul>

	<div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-info" href="{{route('kasus.edit', array($kasus->kasus_id, 'informasi-kasus'))}}">Mengedit</a>
      <a class="btn btn-default" href="#">Kembali ke atas</a>
    </div>
  </div>

</div> <!-- / Faktor Pemicu Panel -->