<div class="panel-heading">
<h4 class="panel-title">
  <a class="in-link" name="homevisit">Homevisit</a>
</h4>
</div>

<table class="table table-responsive table-hover">
@if(!empty($kasus->homevisit->toArray()))
  
  {!! Form::model($kasus, array('route' => array('homevisit2.delete', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

  <tr>
    <th></th>
    <th>Tanggal</th>
    <th>Keterangan</th>
  </tr>

  <?php $i = 0; ?>
  @foreach ($kasus->homevisit as $homevisit)
  <input type="hidden" name="homevisit_id" value="{{$homevisit->homevisit_id}}">
  <input type="hidden" name="kasus_id" value="{{$homevisit->kasus_id}}">
  <tr>
    <td style="text-align:center">
      {!! Form::checkbox('toDelete['.$i.']', $homevisit->homevisit_id, False) !!}
      <?php $i++ ?>
    </td>
    <td>
      <a href="{{ route('kasus.homevisit.edit', array($homevisit->kasus_id, $homevisit->homevisit_id)) }}">
        {{ $homevisit->tanggal }}
      </a>
    </td>
    <td>
      <a href="{{ route('kasus.homevisit.edit', array($homevisit->kasus_id, $homevisit->homevisit_id)) }}">
        {{ $homevisit->keterangan }}
      </a>
    </td>
  </tr>   
  @endforeach

<tr>
  <td colspan="5">
    <a class="btn btn-sm btn-default" href="{{route('kasus.homevisit.create', $kasus->kasus_id)}}">
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

@if(Session::has('edit-homevisit'))
	@include('kasus.partials.homevisit-edit')

@endif

<script type="text/javascript">
	@if(Session::has('edit-homevisit'))
	 	var edit_homevisit = true;
	@else
	 	var edit_homevisit = false;
	@endif
</script>