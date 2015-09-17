<div class="panel panel-info">
	
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="options">
      	<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      	Pilihan
     	</a>
    </h4>
  </div>
	
		<li class="list-group-item">
			<a href="{{route('kasus.xls', $kasus->kasus_id)}}">
				<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
				Ke Excel
			</a>
		</li>
		
		<li class="list-group-item">
			<a style="color:red;" href="{{route('kasus.delete', $kasus->kasus_id)}}">
				<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				Menghapus
			</a>
		</li>
	</ul>

</div> <!-- / Options Panel -->	