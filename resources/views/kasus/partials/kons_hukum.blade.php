<div class="panel panel-default">

  <div class="panel-heading">
  <h4 class="panel-title">
    <a class="in-link" name="kons-hukum">Konseling Hukum</a>
  </h4>
  </div>

  <table class="table table-responsive table-hover">
  @if(!empty($kasus->konsHukum->toArray()))
    
    {!! Form::model($kasus, array('route' => array('konsHukum2.delete', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

    <tr>
      <th></th>
      <th>Tanggal</th>
      <th>Keterangan</th>
    </tr>

    <?php $i = 0; ?>
    @foreach ($kasus->konsHukum as $konsHukum)
    <input type="hidden" name="kons_hukum_id" value="{{$konsHukum->kons_hukum_id}}">
    <input type="hidden" name="kasus_id" value="{{$konsHukum->kasus_id}}">
    <tr>
      <td style="text-align:center">
        {!! Form::checkbox('toDelete['.$i.']', $konsHukum->kons_hukum_id, False) !!}
        <?php $i++ ?>
      </td>
      <td>
        <a href="{{ route('kasus.konsHukum.edit', array($konsHukum->kasus_id, $konsHukum->kons_hukum_id)) }}">
          {{ $konsHukum->tanggal }}
        </a>
      </td>
      <td>
        <a href="{{ route('kasus.konsHukum.edit', array($konsHukum->kasus_id, $konsHukum->kons_hukum_id)) }}">
          {{ $konsHukum->keterangan }}
        </a>
      </td>
    </tr>   
    @endforeach

  <tr>
    <td colspan="5">
      <a class="btn btn-sm btn-default" href="{{route('kasus.konsHukum.create', $kasus->kasus_id)}}">
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

  @if(Session::has('edit-kons_hukum'))
  	@include('kasus.partials.kons_hukum-edit')
  @endif

</div>

<script type="text/javascript">
	@if(Session::has('edit-kons_hukum'))
	 	var edit_kons_hukum = true;
	@else
	 	var edit_kons_hukum = false;
	@endif
</script>