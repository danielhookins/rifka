<div class="panel panel-warning">

<div class="panel-heading">
  <h4 class="panel-title">
    <a class="in-link" name="inactive-users">
      <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
      &nbsp;
      Inactive Users
    </a>
  </h4>
</div>

<table class="table table-responsive table-hover">

	<tr>
		<th>Name</th>
		<th>Email</th>
		<th></th>
		<th></th>
	</tr>

	@foreach($inactive as $user)
		<tr>	
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>
				<a class="btn btn-default" href="{{ route('user.activate', $user->id) }}">
					<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
      		&nbsp;
      		Mengaktifkan
    		</a>
  		</td>
  		<td>
				<a class="btn btn-default" href="{{ route('inactiveUser.delete', $user->id) }}">
					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
      		&nbsp;
      		Hapus
    		</a>
  		</td>
		</tr>
	@endforeach

</table>

</div> <!-- Panel Inactive Users -->
