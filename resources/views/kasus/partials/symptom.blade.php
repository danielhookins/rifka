<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="symptom">Symptoms</a>
    </h4>
  </div>
  
    @forelse ($kasus->symptom as $symptom)
    <input type="hidden" name="symptom_id" value="{{$symptom->symptom_id}}">
    <input type="hidden" name="kasus_id" value="{{$symptom->kasus_id}}">
    <ul class="list-group">
      <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Deskripsi gejala</strong><br />
            {{ $symptom->symptom_description }}
          </p>
        </li>
    </ul>

  <div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-default" data-toggle="modal" href="{{ route('kasus.symptom.edit', array($symptom->kasus_id, $symptom->symptom_id)) }}">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        Edit
      </a>
    </div>
  </div>
    
  @empty
  <ul class="list-group">
    <li class="list-group-item">
      <a class="tambah-link" data-toggle="modal" href="#symptom-baru">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        Tambah Symptoms
      </a>
    </li>
  </ul>
  @endforelse

</div> <!-- / Symptom  Panel -->

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