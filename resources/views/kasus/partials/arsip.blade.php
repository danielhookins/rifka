<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="arsip">Arsip</a>
    </h4>
  </div>

  <table class="table table-responsive table-hover">
    @if(!empty($kasus->arsip->toArray()))
      
      {!! Form::model($kasus, array('route' => array('arsip2.delete', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

      <tr>
        <th></th>
        <th>No Reg</th>
        <th>Lokasi</th>
      </tr>
    
      <?php $i = 0; ?>
      @foreach ($kasus->arsip as $arsip)
      <input type="hidden" name="arsip_id" value="{{$arsip->arsip_id}}">
      <input type="hidden" name="kasus_id" value="{{$arsip->kasus_id}}">
      <tr>
        <td style="text-align:center">
          {!! Form::checkbox('toDelete['.$i.']', $arsip->arsip_id, False) !!}
          <?php $i++ ?>
        </td>
        <td>
          <a href="{{ route('kasus.arsip.edit', array($arsip->kasus_id, $arsip->arsip_id)) }}">
            {{ $arsip->no_reg }}
          </a>
        </td>
        <td>
          <a href="{{ route('kasus.arsip.edit', array($arsip->kasus_id, $arsip->arsip_id)) }}">
            {{ $arsip->lokasi }}
          </a>
        </td>
      </tr>   
      @endforeach

    @else
      <ul class="list-group">
        <li class="list-group-item">
          <a class="tambah-link" data-toggle="modal" href="#arsip-baru">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Arsip
          </a>
        </li>
      </ul>

    @endif

    @if(!empty($kasus->arsip->toArray()))
    <tr>
      <td colspan="5">
        <a class="btn btn-sm btn-default" data-toggle="modal" href="#arsip-baru">
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

</div> <!-- / Arsip Panel -->

@if(Session::has('edit-arsip'))
  @include('kasus.partials.arsip-edit')

@endif

@include('kasus.partials.arsip-baru')

<script type="text/javascript">
  @if(Session::has('edit-arsip'))
     var edit_arsip = true;
  @else
     var edit_arsip = false;
  @endif
</script>