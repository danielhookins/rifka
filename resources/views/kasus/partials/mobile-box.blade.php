<div class="panel panel-default">

<div class="panel-heading">
  <h4 class="panel-title">
    <a class="in-link" name="mobile-box">
      <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
      Kasus #{{$kasus->kasus_id}}
    </a>
  </h4>
</div>

<ul class="list-group">
  
  @if($kasus->jenis_kasus)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Jenis Kasus</strong>
          {{$kasus->jenis_kasus}}
        </p>
    </li>
  @endif

  @forelse($kasus->klienKasus as $klien)
    <li class="list-group-item"><a href="{!! route('klien.index') !!}/{{ $klien->klien_id }}">{{ $klien->nama_klien }}</a>
    ({{$klien->pivot->jenis_klien}})</li>
  @empty
  @endforelse

</ul>

</div> <!-- Panel Mobile Box -->