<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="litigasi">Litigasi</a>
    </h4>
  </div>
  
    @forelse ($kasus->litigasi as $litigasi)
    <ul class="list-group">
      
      @if($litigasi->jenis_litigasi)
        <li class="list-group-item">
            <p class="list-group-item-text">
              <strong>Jenis Litigasi</strong>
              {{$litigasi->jenis_litigasi}}
            </p>
        </li>
      @else
        <li class="list-group-item">
          <p class="list-group-item-text">
            <a class="tambah-link" href="{{ route('kasus.litigasi.edit', array($litigasi->kasus_id, $litigasi->litigasi_id)) }}">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              Tambah Jenis Litigasi
            </a>
          </p>
        </li>
      @endif

      @if($litigasi->undang_digunakan)
        <li class="list-group-item">
            <p class="list-group-item-text">
              <strong>Undang Digunakan</strong>
              {{$litigasi->undang_digunakan}}
            </p>
        </li>
      @else
        <li class="list-group-item">
          <p class="list-group-item-text">
            <a class="tambah-link" href="{{ route('kasus.litigasi.edit', array($litigasi->kasus_id, $litigasi->litigasi_id)) }}">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              Tambah Undang Digunakan
            </a>
          </p>
        </li>
      @endif

      @if($litigasi->kepolisian_wilayah)
        <li class="list-group-item">
            <p class="list-group-item-text">
              <strong>Kepolisian Wilayah</strong>
              {{$litigasi->kepolisian_wilayah}}
            </p>
        </li>
      @else
        <li class="list-group-item">
          <p class="list-group-item-text">
            <a class="tambah-link" href="{{ route('kasus.litigasi.edit', array($litigasi->kasus_id, $litigasi->litigasi_id)) }}">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              Tambah Kepolisian Wilayah
            </a>
          </p>
        </li>
      @endif

      @if($litigasi->nama_penyidik)
        <li class="list-group-item">
            <p class="list-group-item-text">
              <strong>Nama Penyidik</strong>
              {{$litigasi->nama_penyidik}}
            </p>
        </li>
      @else
        <li class="list-group-item">
          <p class="list-group-item-text">
            <a class="tambah-link" href="{{ route('kasus.litigasi.edit', array($litigasi->kasus_id, $litigasi->litigasi_id)) }}">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              Tambah Nama Penyidik
            </a>
          </p>
        </li>
      @endif

      @if($litigasi->pengadilan_wilayah)
        <li class="list-group-item">
            <p class="list-group-item-text">
              <strong>Pengadilan Wilayah</strong>
              {{$litigasi->pengadilan_wilayah}}
            </p>
        </li>
      @else
        <li class="list-group-item">
          <p class="list-group-item-text">
            <a class="tambah-link" href="{{ route('kasus.litigasi.edit', array($litigasi->kasus_id, $litigasi->litigasi_id)) }}">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              Tambah Pengadilan Wilayah
            </a>
          </p>
        </li>
      @endif

      @if($litigasi->nama_hakim)
        <li class="list-group-item">
            <p class="list-group-item-text">
              <strong>Nama Hakim</strong>
              {{$litigasi->nama_hakim}}
            </p>
        </li>
      @else
        <li class="list-group-item">
          <p class="list-group-item-text">
            <a class="tambah-link" href="{{ route('kasus.litigasi.edit', array($litigasi->kasus_id, $litigasi->litigasi_id)) }}">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              Tambah Nama Hakim
            </a>
          </p>
        </li>
      @endif

      @if($litigasi->nama_jaksa)
        <li class="list-group-item">
            <p class="list-group-item-text">
              <strong>Nama Jaksa</strong>
              {{$litigasi->nama_jaksa}}
            </p>
        </li>
      @else
        <li class="list-group-item">
          <p class="list-group-item-text">
            <a class="tambah-link" href="{{ route('kasus.litigasi.edit', array($litigasi->kasus_id, $litigasi->litigasi_id)) }}">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              Tambah Nama Jaksa
            </a>
          </p>
        </li>
      @endif

      @if($litigasi->tuntutan)
        <li class="list-group-item">
            <p class="list-group-item-text">
              <strong>Tuntutan</strong>
              {{$litigasi->tuntutan}}
            </p>
        </li>
      @else
        <li class="list-group-item">
          <p class="list-group-item-text">
            <a class="tambah-link" href="{{ route('kasus.litigasi.edit', array($litigasi->kasus_id, $litigasi->litigasi_id)) }}">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              Tambah Tuntutan
            </a>
          </p>
        </li>
      @endif

      @if($litigasi->putusan)
        <li class="list-group-item">
            <p class="list-group-item-text">
              <strong>Putusan</strong>
              {{$litigasi->putusan}}
            </p>
        </li>
      @else
        <li class="list-group-item">
          <p class="list-group-item-text">
            <a class="tambah-link" href="{{ route('kasus.litigasi.edit', array($litigasi->kasus_id, $litigasi->litigasi_id)) }}">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              Tambah Putusan
            </a>
          </p>
        </li>
      @endif

  </ul>

  <div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-default" href="{{ route('kasus.litigasi.edit', array($litigasi->kasus_id, $litigasi->litigasi_id)) }}">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        Edit
      </a>
    </div>
  </div>

  @include('kasus.partials.kegiatan-litigasi')

  @empty
  <ul class="list-group">
    <li class="list-group-item">
      <a class="tambah-link" data-toggle="modal" href="#litigasi-baru">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        Tambah Litigasi
      </a>
    </li>
  </ul>
  @endforelse

</div> <!-- / Litigasi Panel -->

@if(Session::has('edit-litigasi'))
  @include('kasus.partials.litigasi-edit')

@endif

@include('kasus.partials.litigasi-baru')

<script type="text/javascript">
  @if(Session::has('edit-litigasi'))
     var edit_litigasi = true;
  @else
     var edit_litigasi = false;
  @endif
</script>