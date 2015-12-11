<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="litigasi">Litigasi</a>
    </h4>
  </div>

  <div class="panel-body" style="background-color:#cbf5cb;">
    
    {!! Form::open(array('route' => array('kasus.litigasi.create', $kasus->kasus_id), 'class'=>'form', 'method' => 'GET')) !!}

    <div class="form-inline">
    Tambah Litigasi 
  
      <select class="form-control" name="jenis">
        <option value="litigasiPidana">Pidana</option>
        <option value="litigasiPerdata">Perdata</option>
      </select> 
      <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
    </div>
  
    {!! Form::close() !!}
  
  </div>

</div> <!-- / Layanan Diberikan Panel -->


<? // If Service information exists display the relevant partial ?>
@if(!empty($kasus->litigasiPidana->toArray()))
  @include('kasus.partials.litigasiPidana')
@endif
@if(!empty($kasus->litigasiPerdata->toArray()))
  @include('kasus.partials.litigasiPerdata')
@endif

<? // Show the relevant 'new x' modal based on the user input ?>
@if(Session::has('litigasiPidana-baru'))
  @include('kasus.partials.litigasiPidana-baru')
@elseif(Session::has('litigasiPerdata-baru'))
  @include('kasus.partials.litigasiPerdata-baru')
@endif

<script type="text/javascript">
  
  // Set variables so JS knows to display the 'new x' modal

  @if(Session::has('litigasiPidana-baru'))
    var litigasiPidana_baru = true;
  @else
    var litigasiPidana_baru = false;
  @endif

  @if(Session::has('litigasiPerdata-baru'))
    var litigasiPerdata_baru = true;
  @else
    var litigasiPerdata_baru = false;
  @endif

</script>