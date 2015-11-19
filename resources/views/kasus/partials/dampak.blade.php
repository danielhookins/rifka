<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="dampak">Dampak</a>
    </h4>
  </div>

  <table class="table table-responsive table-hover">
    @if(!empty($kasus->dampak->toArray()))
      
      {!! Form::model($kasus, array('route' => array('selectedDetails.delete', $kasus->kasus_id, "dampak"), 'class'=>'form', 'method' => 'POST')) !!}

      <tr>
        <th></th>
        <th>Jenis</th>
        <th>Keterangan</th>
        <th>Diupdate</th>
      </tr>
    
      <?php $i = 0; ?>
      @foreach ($kasus->dampak as $dampak)
      <input type="hidden" name="dampak_id" value="{{$dampak->dampak_id}}">
      <input type="hidden" name="kasus_id" value="{{$dampak->kasus_id}}">
      <tr>
        <td style="text-align:center">
          {!! Form::checkbox('toDelete['.$i.']', $dampak->dampak_id, False) !!}
          <?php $i++ ?>
        </td>
        <td>
          <a href="{{ route('kasus.dampak.edit', array($dampak->kasus_id, $dampak->dampak_id)) }}">
            {{ $dampak->jenis_dampak }}
          </a>
        </td>
        <td>
          <a href="{{ route('kasus.dampak.edit', array($dampak->kasus_id, $dampak->dampak_id)) }}">
            {{ $dampak->keterangan }}
          </a>
        </td>
        <td>
          <a href="{{ route('kasus.dampak.edit', array($dampak->kasus_id, $dampak->dampak_id)) }}">
            {{ $dampak->updated_at }}
          </a>
        </td>
      </tr>   
      @endforeach

    @else
      <ul class="list-group">
        <li class="list-group-item">
          <a class="tambah-link" data-toggle="modal" href="#dampak-baru">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Dampak
          </a>
        </li>
      </ul>

    @endif

    @if(!empty($kasus->dampak->toArray()))
    <tr>
      <td colspan="5">
        <a class="btn btn-sm btn-default" data-toggle="modal" href="#dampak-baru">
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

</div> <!-- / Dampak Panel -->

@if(Session::has('edit-dampak'))
  @include('kasus.partials..dampak-edit')

@endif

@include('kasus.partials..dampak-baru')

<script type="text/javascript">
  @if(Session::has('edit-dampak'))
     var edit_dampak = true;
  @else
     var edit_dampak = false;
  @endif
</script>