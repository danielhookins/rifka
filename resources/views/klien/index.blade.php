<div class="panel panel-default">
  <div class="panel-heading">Klien Klien</div>
  <div class="panel-body">
    <p>Semua Klien</p>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Klien ID</th>
          <th>Nama Klien</th>
          <th>Jenis Klien</th>
          <th>Created</th>
          <th>Updated</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($semuaKlien as $klien)
        <tr>
          <th scope="row"><a href="klien/{{ $klien->klien_id }}">{{ $klien->klien_id }}</a></th>
          <td>{{ $klien->nama_klien }}</td>
          <td>{{ $klien->jenis_klien }}</td>
          <td>{{ $klien->created_at }}</td>
          <td>{{ $klien->updated_at }}</td>
          <td>[ <a href="klien/{{ $klien->klien_id }}/edit">Edit</a> ]</td>
          <td>[ <a href="klien/{{ $klien->klien_id }}/delete">Delete</a> ]</td>
        </tr>
        @empty
        <td></td>
        <th scope="row"><em>Belum ada Klien.</em></th>
        @endforelse
      </tbody>
      <!--<tbody> -->
        <td></td>
        <td><a href="klien/create">Klien Baru</a></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <!--</tbody> -->
    </table>
  </div><!--/panel-body -->
</div><!--/panel-->