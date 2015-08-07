<div class="panel-heading">
<h4 class="panel-title">
  <a class="in-link" name="mens_program">Men's Program</a>
</h4>
</div>

<table class="table table-responsive table-hover">
@if(!empty($kasus->mensProgram->toArray()))
  
  {!! Form::model($kasus, array('route' => array('mensProgram2.delete', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

  <tr>
    <th></th>
    <th>Tanggal</th>
    <th>Keterangan</th>
  </tr>

  <?php $i = 0; ?>
  @foreach ($kasus->mensProgram as $mensProgram)
  <input type="hidden" name="mens_program_id" value="{{$mensProgram->mens_program_id}}">
  <input type="hidden" name="kasus_id" value="{{$mensProgram->kasus_id}}">
  <tr>
    <td style="text-align:center">
      {!! Form::checkbox('toDelete['.$i.']', $mensProgram->mens_program_id, False) !!}
      <?php $i++ ?>
    </td>
    <td>
      <a href="{{ route('kasus.mensProgram.edit', array($mensProgram->kasus_id, $mensProgram->mens_program_id)) }}">
        {{ $mensProgram->tanggal }}
      </a>
    </td>
    <td>
      <a href="{{ route('kasus.mensProgram.edit', array($mensProgram->kasus_id, $mensProgram->mens_program_id)) }}">
        {{ $mensProgram->keterangan }}
      </a>
    </td>
  </tr>   
  @endforeach

<tr>
  <td colspan="5">
    <a class="btn btn-sm btn-default" href="{{route('kasus.mensProgram.create', $kasus->kasus_id)}}">
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

@if(Session::has('edit-mens_program'))
	@include('kasus.partials.mens_program-edit')

@endif

<script type="text/javascript">
	@if(Session::has('edit-mens_program'))
	 	var edit_mens_program = true;
	@else
	 	var edit_mens_program = false;
	@endif
</script>