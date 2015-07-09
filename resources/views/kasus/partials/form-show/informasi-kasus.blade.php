<div class="panel panel-primary">

<div class="panel-heading">
  <h4 class="panel-title">
    <a class="in-link" name="informasi-kasus">
      <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
      Kasus #{{$kasus->kasus_id}}
    </a>
  </h4>
</div>

<ul class="list-group">
  
  <li class="list-group-item">
    	<p class="list-group-item-text">
        <strong>Kasus ID</strong>
        {{$kasus->kasus_id}}
      </p>
	</li>

	@if($kasus->jenis_kasus)
    <li class="list-group-item">
      	<p class="list-group-item-text">
          <strong>Jenis Kasus</strong>
          {{$kasus->jenis_kasus}}
        </p>
  	</li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" href="{{route('kasus.edit', array($kasus->kasus_id, 'informasi-kasus'))}}">Tambah Jenis Kasus</a>
      </p>
    </li>
  @endif

  @if($kasus->hubungan)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Hubungan</strong>
          {{$kasus->hubungan}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" href="{{route('kasus.edit', array($kasus->kasus_id, 'informasi-kasus'))}}">Tambah Hubungan</a>
      </p>
    </li>
  @endif

  @if($kasus->hubungan)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Lama Hubungan</strong>
          {{$kasus->lama_hubungan}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" href="{{route('kasus.edit', array($kasus->kasus_id, 'informasi-kasus'))}}">Tambah Lama Hubungan</a>
      </p>
    </li>
  @endif

  @if($kasus->sejak_kapan)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Sejak Kapan</strong>
          {{$kasus->sejak_kapan}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" href="{{route('kasus.edit', array($kasus->kasus_id, 'informasi-kasus'))}}">Tambah Sejak kapan</a>
      </p>
    </li>
  @endif

  @if($kasus->seberapa_sering)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Seberapa Sering</strong>
          {{$kasus->seberapa_sering}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" href="{{route('kasus.edit', array($kasus->kasus_id, 'informasi-kasus'))}}">Tambah Seberapa Sering</a>
      </p>
    </li>
  @endif

  @if($kasus->harapan_korban)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Harapan Korban</strong>
          {{$kasus->harapan_korban}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" href="{{route('kasus.edit', array($kasus->kasus_id, 'informasi-kasus'))}}">Tambah Harapan Korban</a>
      </p>
    </li>
  @endif

  @if($kasus->rencana_korban)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Rencana Korban</strong>
          {{$kasus->rencana_korban}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" href="{{route('kasus.edit', array($kasus->kasus_id, 'informasi-kasus'))}}">Tambah Rencana Korban</a>
      </p>
    </li>
  @endif

</ul>

<div class="panel-body">
  <div class="form-inline">
    <a class="btn btn-info" href="{{route('kasus.edit', array($kasus->kasus_id, 'informasi-kasus'))}}">Mengedit</a>
    <a class="btn btn-default" href="#">Kembali ke atas</a>
  </div>
</div>

</div> <!-- Panel Informasi Kasus -->