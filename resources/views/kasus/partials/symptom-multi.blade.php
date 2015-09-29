<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="symptom">Symptom</a>
    </h4>
  </div>

  <table class="table table-responsive table-hover">
    @if(!empty($kasus->symptom->toArray()))
      
      {!! Form::model($kasus, array('route' => array('symptom2.delete', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

      <tr>
        <th></th>
        <th>Deskripsi gejala</th>
      </tr>
    
      <?php $i = 0; ?>
      @foreach ($kasus->symptom as $symptom)
      <input type="hidden" name="symptom_id" value="{{$symptom->symptom_id}}">
      <input type="hidden" name="kasus_id" value="{{$symptom->kasus_id}}">
      <tr>
        <td style="text-align:center">
          {!! Form::checkbox('toDelete['.$i.']', $symptom->symptom_id, False) !!}
          <?php $i++ ?>
        </td>
        <td>
          <a href="{{ route('kasus.symptom.edit', array($symptom->kasus_id, $symptom->symptom_id)) }}">
            {{ $symptom->symptom_description }}
          </a>
        </td>
      </tr>   
      @endforeach

    @else
      <ul class="list-group">
        <li class="list-group-item">
          <a class="tambah-link" data-toggle="modal" href="#symptom-baru">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Symptom
          </a>
        </li>
      </ul>

    @endif

    @if(!empty($kasus->symptom->toArray()))
    <tr>
      <td colspan="5">
        <a class="btn btn-sm btn-default" data-toggle="modal" href="#symptom-baru">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
        <button class="btn btn-sm btn-default" type="submit">
          <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
        </button>
      </td>
    </tr>
    @endif
  
  
  {!! Form::close() !!}

  </table>

</div> <!-- / Symptom Panel -->

@if(Session::has('edit-symptom'))
  @include('kasus.partials.symptom-edit')

@endif

@include('kasus.partials.symptom-baru')

<script type="text/javascript">
  @if(Session::has('edit-symptom'))
     var edit_symptom = true;
  @else
     var edit_symptom = false;
  @endif
</script>