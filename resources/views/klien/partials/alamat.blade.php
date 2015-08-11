<div class="panel-heading">
<h4 class="panel-title">
  <a class="in-link" name="alamat">Alamat</a>
</h4>
</div>

<table class="table table-responsive table-hover">
@if(!empty($klien->alamat->toArray()))
  
  {!! Form::model($klien, array('route' => array('alamat2.delete', $klien->klien_id), 'class'=>'form', 'method' => 'POST')) !!}

  <tr>
    <th></th>
    <th>Alamat</th>
    <th>Kecamatan</th>
    <th>Kabupaten</th>
  </tr>

  <?php $j = 0; ?>
  @foreach ($klien->alamat as $alamat)
  <tr>
    <td style="text-align:center">
      {!! Form::checkbox('toDelete['.$j.']', $alamat->alamat_id, False) !!}
      <?php $j++; ?>
    </td>
    <td>
      <a href="{{ route('klien.alamat.edit', [$klien->klien_id, $alamat->alamat_id]) }}">
        {{ $alamat->alamat }}
      </a>
    </td>
    <td>
      <a href="{{ route('klien.alamat.edit', [$klien->klien_id, $alamat->alamat_id]) }}">
        {{ $alamat->kecamatan }}
      </a>
    </td>
    <td>
      <a href="{{ route('klien.alamat.edit', [$klien->klien_id, $alamat->alamat_id]) }}">
        {{ $alamat->kabupaten }}
      </a>
    </td>
  </tr>   
  @endforeach

@else
  <ul class="list-group">
    <li class="list-group-item">
      <a class="tambah-link" data-toggle="modal" href="#alamat-baru">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
      Tambah Alamat
      </a>
    </li>
  </ul>

@endif

@if(!empty($klien->alamat->toArray()))
<tr>
  <td colspan="5">
    <a class="btn btn-sm btn-default" data-toggle="modal" href="#alamat-baru">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
    <button class="btn btn-sm btn-default" type="submit">
      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
  </td>
</tr>

{!! Form::close() !!}

@endif

</table> <!-- / Alamat -->

@if(Session::has('edit-alamat'))
  @include('klien.partials.alamat-edit')

@endif

@include('klien.partials.alamat-baru')

<script type="text/javascript">
  @if(Session::has('edit-alamat'))
     var edit_alamat = true;
  @else
     var edit_alamat = false;
  @endif
</script>