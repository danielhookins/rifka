<div class="panel panel-primary">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="perkembangan">Perkembangan</a>
    </h4>
  </div>

  <table class="table table-responsive table-hover">
    @if(!empty($kasus->perkembangan->toArray()))
      
      {!! Form::model($kasus, array('route' => array('perkembangan2.delete', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

      <tr>
        <th></th>
        <th>Tanggal</th>
        <th>Intervensi</th>
        <th>Kesimpulan</th>
        <th>Kesepakatan</th>
      </tr>
    
      <?php $i = 0; ?>
      @foreach ($kasus->perkembangan as $perkembangan)
      <input type="hidden" name="perkembangan_id" value="{{$perkembangan->perkembangan_id}}">
      <input type="hidden" name="kasus_id" value="{{$perkembangan->kasus_id}}">
      <tr>
        <td style="text-align:center">
          {!! Form::checkbox('toDelete['.$i.']', $perkembangan->perkembangan_id, False) !!}
          <?php $i++ ?>
        </td>
        <td><a href="{{ route('kasus.perkembangan.edit', array($perkembangan->kasus_id, $perkembangan->perkembangan_id)) }}">{{ $perkembangan->tanggal }}</td>
        <td>{{ $perkembangan->intervensi }}</td>
        <td>{{ $perkembangan->kesimpulan }}</td>
        <td>{{ $perkembangan->kesepakatan }}</td>
      </tr>   
      @endforeach

    @else
      <ul class="list-group">
        <li class="list-group-item">
          <a class="tambah-link" data-toggle="modal" href="#perkembangan-baru">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Perkembangan
          </a>
        </li>
      </ul>

    @endif

    <tr>
      <td colspan="5">
        <a class="btn btn-sm btn-default" data-toggle="modal" href="#perkembangan-baru">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
        @if(!empty($kasus->perkembangan->toArray()))
        <button class="btn btn-sm btn-default" type="submit">
          <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
        </button>
        @endif
      </td>
    </tr>
  
  {!! Form::close() !!}

  </table>

</div> <!-- / Perkembangan Panel -->

@if(Session::has('edit-perkembangan'))
  @include('kasus.partials.form-show.perkembangan-edit')

@endif

@include('kasus.partials.form-show.perkembangan-baru')

<script type="text/javascript">
  @if(Session::has('edit-perkembangan'))
     var edit_perkembangan = true;
  @else
     var edit_perkembangan = false;
  @endif
</script>