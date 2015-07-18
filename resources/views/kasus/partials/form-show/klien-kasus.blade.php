<div class="panel panel-primary">

	<div class="panel-heading">
	  <h4 class="panel-title">
		<a class="in-link" name="klien-kasus">
		  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
		  Klien
		</a>
	  </h4>
	</div>

	<ul class="list-group">
	  @forelse ($kasus->klienKasus as $klien)
		<li class="list-group-item">
			<p class="list-group-item-text">
				{!! Form::checkbox($klien->klien_id, 1, False) !!}
				<strong>{{$klien->pivot->jenis_klien}}</strong>
				<a href="{{route('klien.show', $klien->klien_id)}}">{{ $klien->nama_klien }}</a>
			</p>
		</li>
	  @empty
		<li class="list-group-item">
		  <a class="tambah-link" href="#">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			Tambah Klien
		  </a>
		</li>
	  @endforelse
	</ul>
@if(!empty($kasus->klienKasus->toArray()))
<div class="panel-body">
  <div class="form-inline">
    <a class="btn btn-sm btn-default" href="{{route('kasus.edit', array($kasus->kasus_id))}}">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
    <a class="btn btn-sm btn-default" href="{{route('kasus.edit', array($kasus->kasus_id))}}">
      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </a>
  </div>
</div>
@endif

<!--
<div class="panel-body">
</div>
-->

</div>