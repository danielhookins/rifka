<div class="panel panel-default">

  <div class="panel-heading">
  <h4 class="panel-title">
    <a class="in-link" name="litigasiperdata">Litigasi Perdata</a>
  </h4>
  </div>

  <table class="table table-responsive table-hover">
  @if(!empty($kasus->litigasiPerdata->toArray()))
    
    {!! Form::model($kasus, array('route' => array('litigasiPerdata2.delete', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

    <tr>
      <th></th>
      <th>Nomor Perkara</th>
      <th>Pengadilan Wilayah</th>
    </tr>

    <?php $i = 0; ?>
    @foreach ($kasus->litigasiPerdata as $litigasiPerdata)
    <input type="hidden" name="litigasi_perdata_id" value="{{$litigasiPerdata->litigasi_perdata_id}}">
    <input type="hidden" name="kasus_id" value="{{$litigasiPerdata->kasus_id}}">
    <tr>
      <td style="text-align:center">
        {!! Form::checkbox('toDelete['.$i.']', $litigasiPerdata->litigasi_perdata_id, False) !!}
        <?php $i++ ?>
      </td>
      <td>
        <a href="{{ route('kasus.litigasiPerdata.edit', array($litigasiPerdata->kasus_id, $litigasiPerdata->litigasi_perdata_id)) }}">
          {{ $litigasiPerdata->nomor_perkara }}
        </a>
      </td>
      <td>
        <a href="{{ route('kasus.litigasiPerdata.edit', array($litigasiPerdata->kasus_id, $litigasiPerdata->litigasi_perdata_id)) }}">
          Pengadilan {{ $litigasiPerdata->pengadilan_wilayah_jenis }}
          {{ $litigasiPerdata->pengadilan_wilayah_kabupaten }}
        </a>
      </td>
    </tr>   
    @endforeach

  <tr>
    <td colspan="5">
      <a class="btn btn-sm btn-default" href="{{route('kasus.litigasiPerdata.create', $kasus->kasus_id)}}">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
      </a>
      <button class="btn btn-sm btn-default" type="submit">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
      </button>
    </td>
  </tr>
  @endif

  {!! Form::close() !!}

  </table>

  @if(Session::has('edit-litigasiPerdata'))
    @include('kasus.partials.litigasiPerdata-edit')
  @endif
</div>

<script type="text/javascript">
  @if(Session::has('edit-litigasiPerdata'))
    var edit_litigasiPerdata = true;
  @else
    var edit_litigasiPerdata = false;
  @endif
</script>