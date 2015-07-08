<div class="panel panel-primary">
	
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="options">
      	<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      	Options
     	</a>
    </h4>
  </div>
	
	<ul class="list-group">
		<li class="list-group-item list-group-item-success">
			<a href="{{route('kasus.edit', $kasus->kasus_id)}}">
				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				Mengedit
			</a>
		</li>
		<li class="list-group-item list-group-item-info">
			<a href="{{route('kasus.changes', $kasus->kasus_id)}}">
				<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
				Perubuhan
			</a>
		</li>
		<li class="list-group-item list-group-item-danger">
			<a href="{{route('kasus.delete', $kasus->kasus_id)}}">
				<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				Menghapus
			</a>
		</li>
	</ul>

</div> <!-- / Options Panel -->	