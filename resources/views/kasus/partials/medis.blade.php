<div class="panel panel-default">

  <div class="panel-heading">
  <h4 class="panel-title">
    <a class="in-link" name="medis">Medis</a>
  </h4>
  </div>

  <table class="table table-responsive table-hover">
  @if(!empty($kasus->medis->toArray()))
    
    {!! Form::model($kasus, array('route' => array('medis2.delete', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

    <tr>
      <th></th>
      <th>Tanggal</th>
      <th>Jenis Medis</th>
      <th>Keterangan</th>
    </tr>

    <?php $i = 0; ?>
    @foreach ($kasus->medis as $medis)
    <input type="hidden" name="medis_id" value="{{$medis->medis_id}}">
    <input type="hidden" name="kasus_id" value="{{$medis->kasus_id}}">
    <tr>
      <td style="text-align:center">
        {!! Form::checkbox('toDelete['.$i.']', $medis->medis_id, False) !!}
        <?php $i++ ?>
      </td>
      <td>
        <a href="{{ route('kasus.medis.edit', array($medis->kasus_id, $medis->medis_id)) }}">
          {{ $medis->tanggal }}
        </a>
      </td>
      <td>
        <a href="{{ route('kasus.medis.edit', array($medis->kasus_id, $medis->medis_id)) }}">
          {{ $medis->jenis_medis }}
        </a>
      </td>
      <td>
        <a href="{{ route('kasus.medis.edit', array($medis->kasus_id, $medis->medis_id)) }}">
          {{ $medis->keterangan }}
        </a>
      </td>
    </tr>   
    @endforeach

  <tr>
    <td colspan="5">
      <a class="btn btn-sm btn-default" href="{{route('kasus.medis.create', $kasus->kasus_id)}}">
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

  @if(Session::has('edit-medis'))
  	@include('kasus.partials.medis-edit')
  @endif
</div>

<script type="text/javascript">
	@if(Session::has('edit-medis'))
	 	var edit_medis = true;
	@else
	 	var edit_medis = false;
	@endif
</script>