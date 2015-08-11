<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="informasi-kontak">Informasi Kontak</a>
    </h4>
  </div>

  <ul class="list-group">
    
    @if($klien->no_telp)
      <li class="list-group-item">
          <p class="list-group-item-text">
            <strong>Nomor Telepon</strong>
            {{$klien->no_telp}}
          </p>
      </li>
    @else
      <li class="list-group-item">
        <p class="list-group-item-text">
          <a class="tambah-link" href="{{ route('klien.edit', [$klien->klien_id, 'kontak']) }}">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            Tambah Nomor Telepon
          </a>
        </p>
      </li>
    @endif

    @if($klien->email)
      <li class="list-group-item">
          <p class="list-group-item-text">
            <strong>Email</strong>
            {{$klien->email}}
          </p>
      </li>
    @else
      <li class="list-group-item">
        <p class="list-group-item-text">
          <a class="tambah-link" href="{{ route('klien.edit', [$klien->klien_id, 'kontak']) }}">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            Tambah Email
          </a>
        </p>
      </li>
    @endif

  </ul>

  <div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-default" href="{{ route('klien.edit', [$klien->klien_id, 'kontak']) }}">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        Edit
      </a>
    </div>
  </div>

  @include('klien.partials.alamat')

</div> <!-- / Informasi Kontak Panel -->

@if(Session::has('edit-kontak'))
  @include('klien.partials.kontak-edit')
@endif

<script type="text/javascript">
  @if(Session::has('edit-kontak'))
     var edit_kontak = true;
  @else
     var edit_kontak = false;
  @endif
</script>