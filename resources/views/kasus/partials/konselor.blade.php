<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="konselor">Konselor</a>
    </h4>
  </div>

  @if(Session::has('tambahKonselor'))
    <div class="panel-body">
      @include('konselor.partials.konselor-search')
      <a class="btn btn-default" href="javascript:window.location.reload();">
        <span class="glyphicon glyphicon-remove" aria-hidden="true" href=""></span>
        Batal
      </a>
    </div>
  @endif

  @if(Session::has('searchKonselor'))
    <div class="panel-body">
      @include('konselor.partials.konselor-search-results')
      <a class="btn btn-default" href="javascript:window.location.reload();">
        <span class="glyphicon glyphicon-remove" aria-hidden="true" href=""></span>
        Batal
      </a>
    </div>
  @endif

<table class="table table-responsive table-hover">
    
  @if(!empty($kasus->konselorKasus->toArray()))
  
    {!! Form::model($kasus, array('route' => array('konselor2kasus.delete', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

    <tr>
      <th style="width:1%"></th>
      <th>Nama Konselor</th>
    </tr>
  
    <?php $i = 0; ?>
    @foreach ($kasus->konselorKasus as $konselor)
      <tr>
        <td style="text-align:center">
          {!! Form::checkbox('toDelete['.$i.']', $konselor->konselor_id, False) !!}
          <?php $i++ ?>
        </td>
        <td>
          {{$konselor->nama_konselor}}
        </td>
      </tr>
    @endforeach
      
  @else
    <ul class="list-group">
      <li class="list-group-item">
        <a class="tambah-link" href="{{ route('tambah.konselor') }}">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        Tambah Konselor
        </a>
      </li>
    </ul>

  @endif

  <tr>
    <td colspan="5">
      <a class="btn btn-sm btn-default" href="{{ route('tambah.konselor') }}">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
      </a>
      @if(!empty($kasus->konselorKasus->toArray()))
      <button class="btn btn-sm btn-default" type="submit">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
      </button>
      @endif
    </td>
  </tr>

  {!! Form::close() !!}

  @if($kasus->legacy_konselor)
    <tr style="background-color:#f5f5f5; border-color:#ddd;">
      <th style="width:1%"></th>
      <th>Konselor Asli</th>
    </tr>
    <tr>
      <td></td>
      <td>{{$kasus->legacy_konselor}}</td>
    </tr>
  @endif

</table>

</div> <!-- / Konselor Panel -->