<h2>Klien</h2>

<table border="1">
  <tr>
    @foreach ($attributes as $attribute => $value)
      <td style="padding:5px;"><strong>{!! $attribute !!}</strong></td>
    @endforeach
      <td></td>
      <td></td>
  </tr>
  <tr>
    @forelse ($semuaKlien as $klien)
      <tr>
        @foreach ($attributes as $attribute => $value)
          <td style="padding:5px;">{!! $klien->$attribute !!}</td>
        @endforeach
        <td style="padding:5px;">[<a href="klien/{{ $klien->klien_id }}/edit">Edit</a>]</td>
        <td style="padding:5px;">[<a href="klien/{{ $klien->klien_id }}/delete">Delete</a>]</td>
      </tr>
      @empty
      <td></td>
      <th scope="row"><em>Belum ada Klien.</em></th>
      @endforelse
  </tr>
  <tr>
    <td colspan=2 style="padding:5px;"><a href="klien/create">Klien Baru</a></td>
  </tr>
</table>
{!! str_replace('/?', '?', $semuaKlien->render()) !!}