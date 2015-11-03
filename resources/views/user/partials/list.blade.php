<div class="panel panel-default">

<div class="panel-heading">
  <h4 class="panel-title">
    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
    &nbsp;
    Semua User
  </h4>
</div>

<table id="datatable" class="table table-responsive table-hover">
<thead>
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Jenis</th>
		<th>Status</th>
		<th></th>
	</tr>
</thead>
<tbody>
	@foreach($users as $user)
		<tr>	
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->jenis }}</td>
  		<td>@if($user->active) Aktif @else Tidak Aktif @endif</td>
  		<td>
  			<a href="{{ route('user.edit', $user->id) }}">Edit</a> | 
  			<a href="{{ route('user.changePassword', $user->id) }}">Ganti Kata Sandi</a> | 
  			<a href="{{ route('user.deleteConfirm', $user->id)}}">Menghapus</a>
  		</td>
		</tr>
	@endforeach
</tbody>
</table>

</div> <!-- Panel All Users -->
