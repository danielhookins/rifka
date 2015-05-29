<div class="panel panel-default">
  <div class="panel-heading">Kasus Klien</div>
  <div class="panel-body">
    <p>Semua Kasus</p>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Kasus ID</th>
          <th>Jenis Kasus</th>
          <th>Created</th>
          <th>Updated</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($semuaKasus as $kasus)
        <tr>
          <th scope="row"><a href="kasus/{{ $kasus->kasus_id }}">{{ $kasus->kasus_id }}</a></th>
          <td>{{ $kasus->jenis_kasus }}</td>
          <td>{{ $kasus->created_at }}</td>
          <td>{{ $kasus->updated_at }}</td>
          <td>[ <a href="kasus/{{ $kasus->kasus_id }}/edit">Edit</a> ]</td>
          <td>[ <a href="kasus/{{ $kasus->kasus_id }}/delete">Delete</a> ]</td>
        </tr>
        @empty
        <td></td>
        <th scope="row"><em>Belum ada kasus.</em></th>
        @endforelse
      </tbody>
      <!--<tbody> -->
        <td></td>
        <td><a href="kasus/create">Kasus Baru</a></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <!--</tbody> -->
    </table>
  </div><!--/panel-body -->
</div><!--/panel-->