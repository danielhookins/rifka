<div class="col-sm-12">
<h2>Daftar Klien</h2>
  <table class="table table-condensed">
  <tr>
    <th class="hidden-xs"># ID</th>
    <th>Nama</th>
    <th class="hidden-xs">Telp</th>
    <th>Alamat</th>
    <th class="hidden-xs">Email</th>
  </tr>
  @forelse ($semuaKlien as $klien)
    <tr>
      <td class="hidden-xs"><a href="{!! route('klien.index') !!}/{{ $klien->klien_id }}">{!! $klien->klien_id !!}</a></td>
      <td><a href="{!! route('klien.index') !!}/{{ $klien->klien_id }}">{!! $klien->nama_klien !!}</a></td>
      <td class="hidden-xs">{!! $klien->no_telp !!}</td>
      <td>
        <ul>
          @forelse ($klien->alamatKlien()->get() as $klienAlamat)
            <li>
              {{ $klienAlamat->alamat }}
              @if ($klienAlamat->kecamatan)
                <br />{{ $klienAlamat->kecamatan }}
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
      <td class="hidden-xs">{!! $klien->email !!}</td>
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