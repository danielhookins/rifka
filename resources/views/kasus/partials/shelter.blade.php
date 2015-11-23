<div class="panel panel-default">

  <div class="panel-heading">
  <h4 class="panel-title">
    <a class="in-link" name="shelter">Shelter</a>
  </h4>
  </div>

  <table class="table table-responsive table-hover">
  @if(!empty($kasus->shelter->toArray()))
    
    {!! Form::model($kasus, array('route' => array('shelter2.delete', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

    <tr>
      <th></th>
      <th>Mulai Tanggal</th>
      <th>Sampai Tanggal</th>
      <th>Keterangan</th>
    </tr>

    <?php $i = 0; ?>
    @foreach ($kasus->shelter as $shelter)
    <input type="hidden" name="shelter_id" value="{{$shelter->shelter_id}}">
    <input type="hidden" name="kasus_id" value="{{$shelter->kasus_id}}">
    <tr>
      <td style="text-align:center">
        {!! Form::checkbox('toDelete['.$i.']', $shelter->shelter_id, False) !!}
        <?php $i++ ?>
      </td>
      <td>
        <a href="{{ route('kasus.shelter.edit', array($shelter->kasus_id, $shelter->shelter_id)) }}">
          {{ $shelter->mulai_tanggal }}
        </a>
      </td>
      <td>
        <a href="{{ route('kasus.shelter.edit', array($shelter->kasus_id, $shelter->shelter_id)) }}">
          {{ $shelter->sampai_tanggal }}
        </a>
      </td>
      <td>
        <a href="{{ route('kasus.shelter.edit', array($shelter->kasus_id, $shelter->shelter_id)) }}">
          {{ $shelter->keterangan }}
        </a>
      </td>
    </tr>   
    @endforeach

  <tr>
    <td colspan="5">
      <a class="btn btn-sm btn-default" href="{{route('kasus.shelter.create', $kasus->kasus_id)}}">
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

  @if(Session::has('edit-shelter'))
  	@include('kasus.partials.shelter-edit')
  @endif
</div>

<script type="text/javascript">
	@if(Session::has('edit-shelter'))
	 	var edit_shelter = true;
	@else
	 	var edit_shelter = false;
	@endif
</script>