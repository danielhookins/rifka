<div class="col-sm-12">
<h2>Daftar Kasus</h2>

<table class="table table-condensed">
  <tr>
    <th># Kasus</th>
    <th class="hidden-xs">Jenis Kasus</th>
    <th>Klien</th>
    <th>Arsip</th>
    <th class="hidden-xs">Tgl. Created</th>
  </tr>
  @forelse ($semuaKasus as $kasus)
    <tr>
      <td><a href="{!! route('kasus.index') !!}/{{ $kasus->kasus_id }}">{!! $kasus->kasus_id !!}</a></td>
      <td class="hidden-xs">{!! $kasus->jenis_kasus !!}</a></td>
      <td>
        <ul>
          @forelse ($kasus->klienKasus()->get() as $klienKasus)
            <li><a href="{!! route('klien.index') !!}/{{ $klienKasus->klien_id }}">{{ $klienKasus->nama_klien }}</li>
          @empty
            <li>Tidak ada klien.</li>
          @endforelse
        </ul>
      </td>
      <td>
        <ul>
          @foreach ($kasus->arsip()->get() as $arsip)
            <li>{{ $arsip->no_reg }}</li>
          @endforeach
        </ul>
      </td>
      <td class="hidden-xs">
        {{ $kasus->created_at }}
      </td>
    </tr>
    @empty
    <td></td>
    <th scope="row"><em>Belum ada kasus.</em></th>
    <td colspan=3></td>
  @endforelse
  </table>

{!! str_replace('/?', '?', $semuaKasus->render()) !!}