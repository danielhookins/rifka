<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="layanan-dibutuhkan">Layanan Dibutuhkan</a>
    </h4>
  </div>

  <table class="table table-responsive table-hover">
    @if(!empty($kasus->layananDibutuhkan->toArray()))
      
      {!! Form::model($kasus, array('route' => array('layanandbth2.delete', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

      <tr>
        <th></th>
        <th>Jenis</th>
        <th>Status</th>
        <th>Diupdate</th>
      </tr>
    
      <?php $i = 0; ?>
      @foreach ($kasus->layananDibutuhkan as $layanan)
      <input type="hidden" name="layanan_dbth_id" value="{{$layanan->upaya_id}}">
      <input type="hidden" name="kasus_id" value="{{$layanan->kasus_id}}">
      <tr>
        <td style="text-align:center">
          {!! Form::checkbox('toDelete['.$i.']', $layanan->layanan_dbth_id, False) !!}
          <?php $i++ ?>
        </td>
        <td>
          <a href="{{ route('kasus.layananDibutuhkan.edit', array($layanan->kasus_id, $layanan->layanan_dbth_id)) }}">
            {{ $layanan->jenis_layanan }}
          </a>
        </td>
        <td>
          <a "{{ route('kasus.layananDibutuhkan.edit', array($layanan->kasus_id, $layanan->layanan_dbth_id)) }}">
            {{ $layanan->status }}
          </a>
        </td>
        <td>
          <a href="{{ route('kasus.layananDibutuhkan.edit', array($layanan->kasus_id, $layanan->layanan_dbth_id)) }}">
            {{ $layanan->updated_at }}
          </a>
        </td>
      </tr>   
      @endforeach

    @else
      <ul class="list-group">
        <li class="list-group-item">
          <a class="tambah-link" data-toggle="modal" href="#layanan-dbth-baru">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Layanan Dibutuhkan
          </a>
        </li>
      </ul>

    @endif

    @if(!empty($kasus->layananDibutuhkan->toArray()))
    <tr>
      <td colspan="5">
        <a class="btn btn-sm btn-default" data-toggle="modal" href="#layanan-dbth-baru">
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

</div> <!-- / Layanan Dibutuhkan Panel -->

@if(Session::has('edit-layanan-dibutuhkan'))
  @include('kasus.partials..layanan-dibutuhkan-edit')

@endif

@include('kasus.partials..layanan-dibutuhkan-baru')

<script type="text/javascript">
  @if(Session::has('edit-layanan-dibutuhkan'))
     var edit_layanan_dibutuhkan = true;
  @else
     var edit_layanan_dibutuhkan = false;
  @endif
</script>