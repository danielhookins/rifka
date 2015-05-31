<h2>Kasus</h2>

<table border="1">
  <tr>
    @foreach ($attributes as $attribute => $value)
      <td style="padding:5px;"><strong>{!! $attribute !!}</strong></td>
    @endforeach
      <td></td>
      <td></td>
  </tr>
  <tr>
    @forelse ($semuaKasus as $kasus)
      <tr>
        @foreach ($attributes as $attribute => $value)
          <td style="padding:5px;">{!! $kasus->$attribute !!}</td>
        @endforeach
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