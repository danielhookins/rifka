<div class="panel panel-default">

  <div class="panel-heading">
  <h4 class="panel-title">
    <a class="in-link" name="mediasi">Mediasi</a>
  </h4>
  </div>

  <table class="table table-responsive table-hover">
  @if(!empty($kasus->mediasi->toArray()))
    
    {!! Form::model($kasus, array('route' => array('mediasi2.delete', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

    <tr>
      <th></th>
      <th>Tanggal</th>
      <th>Hasil</th>
      <th>Keterangan</th>
    </tr>

    <?php $i = 0; ?>
    @foreach ($kasus->mediasi as $mediasi)
    <input type="hidden" name="mediasi_id" value="{{$mediasi->mediasi_id}}">
    <input type="hidden" name="kasus_id" value="{{$mediasi->kasus_id}}">
    <tr>
      <td style="text-align:center">
        {!! Form::checkbox('toDelete['.$i.']', $mediasi->mediasi_id, False) !!}
        <?php $i++ ?>
      </td>
      <td>
        <a href="{{ route('kasus.mediasi.edit', array($mediasi->kasus_id, $mediasi->mediasi_id)) }}">
          {{ $mediasi->tanggal }}
        </a>
      </td>
      <td>
        <a href="{{ route('kasus.mediasi.edit', array($mediasi->kasus_id, $mediasi->mediasi_id)) }}">
          {{ $mediasi->hasil }}
        </a>
      </td>
      <td>
        <a href="{{ route('kasus.mediasi.edit', array($mediasi->kasus_id, $mediasi->mediasi_id)) }}">
          {{ $mediasi->keterangan }}
        </a>
      </td>
    </tr>   
    @endforeach

  <tr>
    <td colspan="5">
      <a class="btn btn-sm btn-default" href="{{route('kasus.mediasi.create', $kasus->kasus_id)}}">
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

  @if(Session::has('edit-mediasi'))
  	@include('kasus.partials.mediasi-edit')
  @endif
</div>

<script type="text/javascript">
	@if(Session::has('edit-mediasi'))
	 	var edit_mediasi = true;
	@else
	 	var edit_mediasi = false;
	@endif
</script>