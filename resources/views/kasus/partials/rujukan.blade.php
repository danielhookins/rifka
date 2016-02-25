<div class="panel panel-default">

  <div class="panel-heading">
  <h4 class="panel-title">
    <a class="in-link" name="rujukan">Rujukan</a>
  </h4>
  </div>

  <table class="table table-responsive table-hover">
  @if(!empty($kasus->rujukan->toArray()))
    
    {!! Form::model($kasus, array('route' => array('selectedDetails.delete', $kasus->kasus_id, "rujukan"), 'class'=>'form', 'method' => 'POST')) !!}

    <tr>
      <th></th>
      <th>Tanggal</th>
      <th>Keterangan</th>
    </tr>

    <?php $i = 0; ?>
    @foreach ($kasus->rujukan as $rujukan)
    <input type="hidden" name="rujukan_id" value="{{$rujukan->rujukan_id}}">
    <input type="hidden" name="kasus_id" value="{{$rujukan->kasus_id}}">
    <tr>
      <td style="text-align:center">
        {!! Form::checkbox('toDelete['.$i.']', $rujukan->rujukan_id, False) !!}
        <?php $i++ ?>
      </td>
      <td>
        <a href="{{ route('kasus.rujukan.edit', array($rujukan->kasus_id, $rujukan->rujukan_id)) }}">
          {{ $rujukan->tanggal }}
        </a>
      </td>
      <td>
        <a href="{{ route('kasus.rujukan.edit', array($rujukan->kasus_id, $rujukan->rujukan_id)) }}">
          {{ $rujukan->keterangan }}
        </a>
      </td>
    </tr>   
    @endforeach

  <tr>
    <td colspan="5">
      <a class="btn btn-sm btn-default" href="{{route('kasus.rujukan.create', $kasus->kasus_id)}}">
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

  @if(Session::has('edit-rujukan'))
  	@include('kasus.partials.rujukan-edit')
  @endif
</div>

<script type="text/javascript">
	@if(Session::has('edit-rujukan'))
	 	var edit_rujukan = true;
	@else
	 	var edit_rujukan = false;
	@endif
</script>