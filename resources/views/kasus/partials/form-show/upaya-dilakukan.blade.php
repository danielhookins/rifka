<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="upaya-dilakukan">Upaya Dilakukan</a>
    </h4>
  </div>

  @if(isset($kasus->upayaDilakukan))
    <table class="table table-responsive table-hover">
      <tr>
        <th>Jenis Upaya</th>
        <th>Hasil</th>  
      </tr>

      @foreach ($kasus->upayaDilakukan as $upaya)
      <input type="hidden" name="upaya_id" value="{{$upaya->upaya_id}}">
      <input type="hidden" name="kasus_id" value="{{$upaya->kasus_id}}">
      <tr>
        <td>{{ $layanan->jenis_upaya }}</td>
        <td>{{ $layanan->hasil }}</td>
      </tr>
      @endforeach
    
    </table>

    <div class="panel-body">
      <div class="form-inline">
        <a class="btn btn-default" href="{{route('kasus.edit', array($kasus->kasus_id, 'upaya-dilakukan'))}}">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          Edit
        </a>
      </div>
    </div>

  @else
    <ul class="list-group">
      <li class="list-group-item">
        <a class="tambah-link" href="{{route('kasus.edit', array($kasus->kasus_id, 'upaya-dilakukan'))}}">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Upaya Dilakukan
        </a>
      </li>
    </ul>

  @endif

</div> <!-- / Upaya Dilakukan Panel -->