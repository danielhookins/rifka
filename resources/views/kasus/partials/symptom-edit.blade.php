<?php $symptomActive = Session::get('symptom-active') ?>

<div class="modal fade" id="symptom-edit">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::model($symptomActive, array(
        'route' => array('kasus.symptom.update', 
          $symptomActive->kasus_id, 
          $symptomActive->symptom_id), 
        'class'=>'form', 
        'method' => 'PUT')) 
      !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Symptoms</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('symptom_description', 'Deskripsi gejala', array('class' => 'strongLabel', 'autocomplete' => 'off')) !!}
          <textarea name="symptom_description" class="form-control" placeholder="Menulis deskripsi gejala disini." rows="{!! ((strlen($symptomActive->symptom_description) / 72) < 5 ) ? '10' : '20'; !!}">{{ $symptomActive->symptom_description}}</textarea>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          Batal
        </button>
        <button type="submit" class="btn btn-primary">
          <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
          Simpan
        </button>
      </div>
    
      {!! Form::close() !!}

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->