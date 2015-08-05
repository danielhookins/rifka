<div class="panel-heading">
<h4 class="panel-title">
  <a class="in-link" name="kegiatan-litigasi">Kegiatan Litigasi</a>
</h4>
</div>

<table class="table table-responsive table-hover">
@if(!empty($litigasi->kegiatan->toArray()))
  
  {!! Form::model($litigasi, array('route' => array('kegiatan2.delete', $kasus->kasus_id, $litigasi->litigasi_id), 'class'=>'form', 'method' => 'POST')) !!}

  <tr>
    <th></th>
    <th>Tanggal</th>
    <th>Kegiatan</th>
    <th>Informasi</th>
  </tr>

  <?php $j = 0; ?>
  @foreach ($litigasi->kegiatan as $kegiatan)
  <input type="hidden" name="kegiatan_litigasi_id" value="{{$kegiatan->kegiatan_litigasi_id}}">
  <input type="hidden" name="litigasi_id" value="{{$litigasi->litigasi_id}}">
  <tr>
    <td style="text-align:center">
      {!! Form::checkbox('toDelete['.$j.']', $kegiatan->kegiatan_litigasi_id, False) !!}
      <?php $j++; ?>
    </td>
    <td>
      <a href="{{ route('kasus.litigasi.kegiatan.edit', array(
        $litigasi->kasus_id,
        $kegiatan->litigasi_id,
        $kegiatan->kegiatan_litigasi_id
      )) }}">
        {{ $kegiatan->tanggal }}
      </a>
    </td>
    <td>
      <a href="{{ route('kasus.litigasi.kegiatan.edit', array(
        $litigasi->kasus_id,
        $kegiatan->litigasi_id,
        $kegiatan->kegiatan_litigasi_id
      )) }}">
        {{ $kegiatan->kegiatan }}
      </a>
    </td>
    <td>
      <a href="{{ route('kasus.litigasi.kegiatan.edit', array(
        $litigasi->kasus_id,
        $kegiatan->litigasi_id,
        $kegiatan->kegiatan_litigasi_id
      )) }}">
        {{ $kegiatan->informasi }}
      </a>
    </td>
  </tr>   
  @endforeach

@else
  <ul class="list-group">
    <li class="list-group-item">
      <a class="tambah-link" data-toggle="modal" href="#kegiatan-litigasi-baru">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
      Tambah Kegiatan Litigasi
      </a>
    </li>
  </ul>

@endif

@if(!empty($litigasi->kegiatan->toArray()))
<tr>
  <td colspan="5">
    <a class="btn btn-sm btn-default" data-toggle="modal" href="#kegiatan-litigasi-baru">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
    <button class="btn btn-sm btn-default" type="submit">
      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
  </td>
</tr>

{!! Form::close() !!}

@endif

</table> <!-- / Kegiatan Litigasi -->

@if(Session::has('edit-kegiatan'))
  @include('kasus.partials.kegiatan-litigasi-edit')

@endif

@include('kasus.partials.kegiatan-litigasi-baru')

<script type="text/javascript">
  @if(Session::has('edit-kegiatan'))
     var edit_kegiatan = true;
  @else
     var edit_kegiatan = false;
  @endif
</script>