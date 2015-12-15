<div class="panel panel-default">

  <div class="panel-heading">
  <h4 class="panel-title">
    <a class="in-link" name="litigasipidana">Litigasi Pidana</a>
  </h4>
  </div>

  <table class="table table-responsive table-hover">
  @if(!empty($kasus->litigasiPidana->toArray()))
    
    {!! Form::model($kasus, array('route' => array('litigasiPidana2.delete', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

    <tr>
      <th></th>
      <th>Pidana Jenis</th>
      <th>Nomor Perkara</th>
    </tr>

    <?php $i = 0; ?>
    @foreach ($kasus->litigasiPidana as $litigasiPidana)
    <input type="hidden" name="litigasi_pidana_id" value="{{$litigasiPidana->litigasi_pidana_id}}">
    <input type="hidden" name="kasus_id" value="{{$litigasiPidana->kasus_id}}">
    <tr>
      <td style="text-align:center">
        {!! Form::checkbox('toDelete['.$i.']', $litigasiPidana->litigasi_pidana_id, False) !!}
        <?php $i++ ?>
      </td>
      <td>
        <a href="{{ route('kasus.litigasiPidana.edit', array($litigasiPidana->kasus_id, $litigasiPidana->litigasi_pidana_id)) }}">
          {{ $litigasiPidana->pidana_jenis }}
        </a>
      </td>
      <td>
        <a href="{{ route('kasus.litigasiPidana.edit', array($litigasiPidana->kasus_id, $litigasiPidana->litigasi_pidana_id)) }}">
          {{ $litigasiPidana->nomor_perkara }}
        </a>
      </td>
  
    </tr>   
    @endforeach

  <tr>
    <td colspan="5">
      <a class="btn btn-sm btn-default" href="{{route('kasus.litigasiPidana.create', $kasus->kasus_id)}}">
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

  @if(Session::has('edit-litigasiPidana'))
    @include('kasus.partials.litigasiPidana-edit')
  @endif
</div>

<script type="text/javascript">
  @if(Session::has('edit-litigasiPidana'))
    var edit_litigasiPidana = true;
  @else
    var edit_litigasiPidana = false;
  @endif
</script>