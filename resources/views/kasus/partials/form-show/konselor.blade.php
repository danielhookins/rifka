<div class="panel panel-primary">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="konselor">Konselor</a>
    </h4>
  </div>

  @if($kasus->legacy_konselor || True)
    <table class="table table-responsive table-hover">
      
      @if(True)
        <tr>
          <th style="width:1%"></th>
          <th>Nama Konselor</th>
        </tr>

        <?php $i = 0; ?>

        <tr>
          <td style="text-align:center">
            {!! Form::checkbox('toDelete['.$i.']', null, False) !!}
            <?php $i++ ?>
          </td>
          <td>
            Bob Jones
          </td>
        </tr>

      @endif

      <tr>
        <td colspan="4">
          <a class="btn btn-sm btn-default" href="#">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          </a>
          @if(True)
          <button class="btn btn-sm btn-default" type="submit">
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
          </button>
          @endif
        </td>
      </tr>

      @if($kasus->legacy_konselor)
        <tr>
          <th style="width:1%"></th>
          <th>Konselor Asli</th>
        </tr>
        <tr>
          <td></td>
          <td>{{$kasus->legacy_konselor}}</td>
        </tr>
      @endif

    </table>

  @else
  <ul class="list-group">
    <li class="list-group-item">
      <a href="" class="tambah-link">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        Tambah Konselor
      </a>
    </li>
  </ul>

@endif

</div> <!-- / Konselor Panel -->