<div class="panel panel-default">
  
<div class="panel-heading">
  <h4 class="panel-title">
    <a class="in-link" name="litigasi">
      Litigasi
    </a>
  </h4>
</div>

<ul class="list-group">

@if(!empty($kasus->litigasi))

    @foreach($kasus->litigasi as $litigasi)

    	@if($litigasi->jenis_litigasi)
        <li class="list-group-item">
          	<p class="list-group-item-text">
              <strong>Jenis Litigasi</strong>
              {{$litigasi->jenis_litigasi}}
            </p>
      	</li>
      @else
        <li class="list-group-item">
          <p class="list-group-item-text">
            <a class="tambah-link" href="{{route('kasus.edit', array($kasus->kasus_id, 'litigasi'))}}">Tambah Jenis Litigasi</a>
          </p>
        </li>
      @endif

  @endforeach

@else
  
  <li class="list-group-item">
    <p class="list-group-item-text">
      <a class="tambah-link" href="{{route('kasus.edit', array($kasus->kasus_id, 'litigasi'))}}">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        Tambah Litigasi
      </a>
    </p>
  </li>

@endif

</ul>

</div> <!-- Panel Litigasi -->