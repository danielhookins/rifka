<div class="panel panel-warning">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="layanan-dibutuhkan">Layanan Dibutuhkan</a>
    </h4>
  </div>

  <ul class="list-group">
  @forelse ($kasus->layananDibutuhkan as $layanan)
  <input type="hidden" name="layanan_dbth_id" value="{{$layanan->layanan_dbth_id}}">
  <input type="hidden" name="kasus_id" value="{{$layanan->kasus_id}}">
    
    <li class="list-group-item">
      <div class="form-group">
        <div class="col-sm-6">
          {!! Form::label('jenis_layanan', 'Jenis Layanan', array(
            'class' => 'strongLabel')) !!}
          {!! Form::text('jenis_layanan', $layanan->jenis_layanan, array(
            'class'     => 'form-control',
            'placeholder'   => 'Jenis Layanan'))!!}
        </div>
        <div class="col-sm-6">
          {!! Form::label('status', 'Status', array(
            'class' => 'strongLabel')) !!}
          {!! Form::select('status', array(
            'Status'                =>  'Status',
            'Sudah Diberikan'       =>  'Sudah Diberikan',
            'Belum Diberikan'       =>  'Belum Diberikan',
            'Dibatalkan'               =>  'Dibatalkan'
            ), $layanan->status, array('class' => 'form-control'))!!}
        </div>
      </div>
    </li>

  @empty
    belum ada

  @endforelse

  </ul>

  <div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-default" href="#">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
        Tambah Layanan
      </a>
    </div>
  </div>

</div>