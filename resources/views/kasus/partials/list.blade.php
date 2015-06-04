
<h2>Kasus</h2>

  <table border="1">
    <tr>
        <th style="padding:5px;">Kasus ID</th>
        <th style="padding:5px;">Jenis Kasus</th>
        <th style="padding:5px;">Tgl. Created</th>
        <th style="padding:5px;">Tgl. Updated</th>
        <td colspan=2></td>
    </tr>
    <tr>
      @forelse ($semuaKasus as $kasus)
        <tr>
          <td style="padding:5px;"><a href="kasus/{!! $kasus->kasus_id !!}">{!! $kasus->kasus_id !!}</a></td>
          <td style="padding:5px;">{!! $kasus->jenis_kasus !!}</td>
          <td style="padding:5px;">{!! $kasus->created_at !!}</td>
          <td style="padding:5px;">{!! $kasus->updated_at !!}</td>
          <td style="padding:5px;">[<a href="kasus/{{ $kasus->kasus_id }}/edit">Edit</a>]</td>
          <td style="padding:5px;">[<a href="kasus/{{ $kasus->kasus_id }}/delete">Delete</a>]</td>
        </tr>
        @empty
        <td></td>
        <th scope="row"><em>Belum ada Kasus.</em></th>
        @endforelse
    </tr>
    <tr>
      <td colspan=2 style="padding:5px;"><a href="kasus/create">Kasus Baru</a></td>
    </tr>
  </table>

{!! str_replace('/?', '?', $semuaKasus->render()) !!}
