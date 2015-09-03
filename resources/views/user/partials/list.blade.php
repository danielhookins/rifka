<div class="panel panel-default">

<div class="panel-heading">
  <h4 class="panel-title">
    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
    &nbsp;
    Semua User
  </h4>
</div>

<table class="table table-responsive table-hover">

	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Jenis</th>
		<th>Status</th>
		<th></th>
	</tr>

	@foreach($users as $user)
		<tr>	
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->jenis }}</td>
  		<td>@if($user->active) Aktif @else Tidak Aktif @endif</td>
  		<td></td>
		</tr>
	@endforeach

</table>

</div> <!-- Panel All Users -->
