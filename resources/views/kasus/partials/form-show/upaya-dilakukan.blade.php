<div class="panel panel-primary">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="upaya-dilakukan">Upaya Dilakukan</a>
    </h4>
  </div>

  <table class="table table-responsive table-hover">
    @if(!empty($kasus->upayaDilakukan->toArray()))
      
      {!! Form::model($kasus, array('route' => array('upaya2.delete', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

      <tr>
        <th></th>
        <th>Jenis</th>
        <th>Hasil</th>
        <th>Diupdate</th>
      </tr>
    
      <?php $i = 0; ?>
      @foreach ($kasus->upayaDilakukan as $upaya)
      <input type="hidden" name="upaya_id" value="{{$upaya->upaya_id}}">
      <input type="hidden" name="kasus_id" value="{{$upaya->kasus_id}}">
      <tr>
        <td style="text-align:center">
          {!! Form::checkbox('toDelete['.$i.']', $upaya->upaya_id, False) !!}
          <?php $i++ ?>
        </td>
        <td>
          <a href="{{ route('kasus.upayaDilakukan.edit', array($upaya->kasus_id, $upaya->upaya_id)) }}">
            {{ $upaya->jenis_upaya }}
          </a>
        </td>
        <td>
          <a "{{ route('kasus.upayaDilakukan.edit', array($upaya->kasus_id, $upaya->upaya_id)) }}">
            {{ $upaya->hasil }}
          </a>
        </td>
        <td>
          <a href="{{ route('kasus.upayaDilakukan.edit', array($upaya->kasus_id, $upaya->upaya_id)) }}">
            {{ $upaya->updated_at }}
          </a>
        </td>
      </tr>   
      @endforeach

    @else
      <ul class="list-group">
        <li class="list-group-item">
          <a class="tambah-link" data-toggle="modal" href="#upaya-baru">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Upaya Dilakukan
          </a>
        </li>
      </ul>

    @endif

    @if(!empty($kasus->upayaDilakukan->toArray()))
    <tr>
      <td colspan="5">
        <a class="btn btn-sm btn-default" data-toggle="modal" href="#upaya-baru">
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

</div> <!-- / Upaya Dilakukan Panel -->

@if(Session::has('edit-upaya'))
  @include('kasus.partials.form-show.upaya-dilakukan-edit')

@endif

@include('kasus.partials.form-show.upaya-dilakukan-baru')

<script type="text/javascript">
  @if(Session::has('edit-upaya'))
     var edit_upaya = true;
  @else
     var edit_upaya = false;
  @endif
</script>