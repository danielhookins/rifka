<div class="panel panel-warning">

<div class="panel-heading">
  <h4 class="panel-title">
    <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
    &nbsp;
    User Belum Aktif
  </h4>
</div>

<table class="table table-responsive table-hover">

	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Jenis</th>
		<th></th>
		<th></th>
	</tr>

	@foreach($inactive as $user)
		{!! Form::open(array(
	        'route' => array('user.update', 
	          $user->id), 
	        'class'=>'form', 
	        'method' => 'POST')) 
	      !!}

    <input type="hidden" name="activate" value="1" />

		<tr>	
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>{!! Form::select('jenis', array(
            'Konselor' 			=> 'Konselor',
            'Manager'  			=> 'Manager',
            'Front Office'	=> 'Front Office',
            'Developer'     => 'Developer'
          ), null, array('class' => 'form-control')) !!}</td>
			<td>
				<button class="btn btn-default" name="activateBtn" type="submit" value="activate">
					<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
      		&nbsp;
      		Mengaktifkan
    		</button>
  		</td>
  		<td>
				<button class="btn btn-default" name="deleteBtn" type="submit" value="delete">
					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
      		&nbsp;
      		Hapus
    		</button>
  		</td>
		</tr>

		{!! Form::close() !!}

	@endforeach

</table>

</div> <!-- Panel Inactive Users -->
