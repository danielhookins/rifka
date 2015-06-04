<div class="col-sm-12">
<h2>Daftar Klien</h2>
  <table class="table table-condensed">
  <tr>
    <th># ID</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Telp</th>
    <th>Alamat</th>
  </tr>
  @forelse ($semuaKlien as $klien)
    <tr>
      <td><a href="{!! route('klien.index') !!}/{{ $klien->klien_id }}">{!! $klien->klien_id !!}</a></td>
      <td><a href="{!! route('klien.index') !!}/{{ $klien->klien_id }}">{!! $klien->nama_klien !!}</a></td>
      <td>{!! $klien->email !!}</td>
      <td>{!! $klien->no_telp !!}</td>
      <td>
        <ul>
          @forelse ($klien->alamatKlien()->get() as $klienAlamat)
            <li>
              {{ $klienAlamat->alamat }}
              @if ($klienAlamat->kecematan)
                <br />{{ $klienAlamat->kecematan }}
              @endif
              @if ($klienAlamat->kabupaten)
                <br />{{ $klienAlamat->kabupaten }}
              @endif
            </li>
          @empty
            <li></li>
          @endforelse
        </ul>
      </td>
    </tr>
    @empty
    <td></td>
    <th scope="row"><em>Belum ada klien.</em></th>
    <td colspan=3></td>
  @endforelse
  </table>
</div>
<div class="col-sm-12">
{!! str_replace('/?', '?', $semuaKlien->render()) !!}
</div>