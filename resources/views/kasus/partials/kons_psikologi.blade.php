<div class="panel panel-default">

  <div class="panel-heading">
  <h4 class="panel-title">
    <a class="in-link" name="kons-psikologi">Konseling Psikologi</a>
  </h4>
  </div>

  <table class="table table-responsive table-hover">
  @if(!empty($kasus->konsPsikologi->toArray()))
    
    {!! Form::model($kasus, array('route' => array('konsPsikologi2.delete', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

    <tr>
      <th></th>
      <th>Tanggal</th>
      <th>Keterangan</th>
    </tr>

    <?php $i = 0; ?>
    @foreach ($kasus->konsPsikologi as $konsPsikologi)
    <input type="hidden" name="kons_psikologi_id" value="{{$konsPsikologi->kons_psikologi_id}}">
    <input type="hidden" name="kasus_id" value="{{$konsPsikologi->kasus_id}}">
    <tr>
      <td style="text-align:center">
        {!! Form::checkbox('toDelete['.$i.']', $konsPsikologi->kons_psikologi_id, False) !!}
        <?php $i++ ?>
      </td>
      <td>
        <a href="{{ route('kasus.konsPsikologi.edit', array($konsPsikologi->kasus_id, $konsPsikologi->kons_psikologi_id)) }}">
          {{ $konsPsikologi->tanggal }}
        </a>
      </td>
      <td>
        <a href="{{ route('kasus.konsPsikologi.edit', array($konsPsikologi->kasus_id, $konsPsikologi->kons_psikologi_id)) }}">
          {{ $konsPsikologi->keterangan }}
        </a>
      </td>
    </tr>   
    @endforeach

  <tr>
    <td colspan="5">
      <a class="btn btn-sm btn-default" href="{{route('kasus.konsPsikologi.create', $kasus->kasus_id)}}">
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

  @if(Session::has('edit-kons_psikologi'))
  	@include('kasus.partials.kons_psikologi-edit')
  @endif
</div>

<script type="text/javascript">
	@if(Session::has('edit-kons_psikologi'))
	 	var edit_kons_psikologi = true;
	@else
	 	var edit_kons_psikologi = false;
	@endif
</script>