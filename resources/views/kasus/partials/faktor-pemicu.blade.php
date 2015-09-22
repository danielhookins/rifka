<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="faktorpemicu">Faktor Pemicu</a>
    </h4>
  </div>

  <table class="table table-responsive table-hover">
    @if(!empty($kasus->faktorPemicu->toArray()))
      
      {!! Form::model($kasus, array('route' => array('pemicu2.delete', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

      <tr>
        <th></th>
        <th>Jenis Pemicu</th>
        <th>Keterangan</th>
      </tr>
    
      <?php $i = 0; ?>
      @foreach ($kasus->faktorPemicu as $pemicu)
      <tr>
        <td style="text-align:center">
          {!! Form::checkbox('toDelete['.$i.']', $pemicu->pemicu_id, False) !!}
          <?php $i++ ?>
        </td>
        <td>
          <a href="{{route('kasus.faktorPemicu.edit', [$kasus->kasus_id, $pemicu->pemicu_id])}}">
            {{ $pemicu->jenis_pemicu }}
          </a>
        </td>
        <td>
          <a href="{{route('kasus.faktorPemicu.edit', [$kasus->kasus_id, $pemicu->pemicu_id])}}">
            {{ $pemicu->keterangan }}
          </a>
        </td>
      </tr>   
      @endforeach

    @else
      <ul class="list-group">
        <li class="list-group-item">
          <a class="tambah-link" data-toggle="modal" href="#pemicu-baru">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Faktor Pemicu
          </a>
        </li>
      </ul>

    @endif

    @if(!empty($kasus->faktorPemicu->toArray()))
    <tr>
      <td colspan="5">
        <a class="btn btn-sm btn-default" data-toggle="modal" href="#pemicu-baru">
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

</div> <!-- / Faktor Pemicu Panel -->

@if(Session::has('edit-pemicu'))
  @include('kasus.partials..pemicu-edit')

@endif

@include('kasus.partials..pemicu-baru')

<script type="text/javascript">
  @if(Session::has('edit-pemicu'))
     var edit_pemicu = true;
  @else
     var edit_pemicu = false;
  @endif
</script>