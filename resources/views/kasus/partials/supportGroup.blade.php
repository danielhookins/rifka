<div class="panel-heading">
<h4 class="panel-title">
  <a class="in-link" name="supportGroup">Support Group</a>
</h4>
</div>

<table class="table table-responsive table-hover">
@if(!empty($kasus->supportGroup->toArray()))
  
  {!! Form::model($kasus, array('route' => array('supportGroup2.delete', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

  <tr>
    <th></th>
    <th>Tanggal</th>
    <th>Keterangan</th>
  </tr>

  <?php $i = 0; ?>
  @foreach ($kasus->supportGroup as $supportGroup)
  <input type="hidden" name="supportGroup_id" value="{{$supportGroup->support_group_id}}">
  <input type="hidden" name="kasus_id" value="{{$supportGroup->kasus_id}}">
  <tr>
    <td style="text-align:center">
      {!! Form::checkbox('toDelete['.$i.']', $supportGroup->support_group_id, False) !!}
      <?php $i++ ?>
    </td>
    <td>
      <a href="{{ route('kasus.supportGroup.edit', array($supportGroup->kasus_id, $supportGroup->support_group_id)) }}">
        {{ $supportGroup->tanggal }}
      </a>
    </td>
    <td>
      <a href="{{ route('kasus.supportGroup.edit', array($supportGroup->kasus_id, $supportGroup->support_group_id)) }}">
        {{ $supportGroup->keterangan }}
      </a>
    </td>
  </tr>   
  @endforeach

<tr>
  <td colspan="5">
    <a class="btn btn-sm btn-default" href="{{route('kasus.supportGroup.create', $kasus->kasus_id)}}">
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

@if(Session::has('edit-supportGroup'))
	@include('kasus.partials.supportGroup-edit')

@endif

<script type="text/javascript">
	@if(Session::has('edit-supportGroup'))
	 	var edit_supportGroup = true;
	@else
	 	var edit_supportGroup = false;
	@endif
</script>