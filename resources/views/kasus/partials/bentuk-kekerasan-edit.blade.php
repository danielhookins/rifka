<?php $bentukKekerasanActive = Session::get('bentukKekerasan-active') ?>

<div class="modal fade" id="bentukKekerasan-edit">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::model($bentukKekerasanActive, array(
      'route' => array(
        'kasus.bentukKekerasan.update',
        $kasus->kasus_id,
        $bentukKekerasanActive->bentuk_id), 
      'class'=>'form', 
      'method' => 'PUT'))
      !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Bentuk Kekerasan</h4>
      </div>

      <div class="modal-body">
        <div class="">
          <strong>Jenis Kekerasan</strong>
        </div>
        <div class="form-inline">
          <div class="checkbox">
            <label>
              {!! Form::checkbox('emosional', 1, null) !!} Emosional
            </label>
          </div>
          <div class="checkbox">
            <label>
              {!! Form::checkbox('fisik', 1, null) !!} Fisik
            </label>
          </div>
          <div class="checkbox">
            <label>
              {!! Form::checkbox('ekonomi', 1, null) !!} Ekonomi
            </label>
          </div>
          <div class="checkbox">
            <label>
              {!! Form::checkbox('seksual', 1, null) !!} Seksual
            </label>
          </div>
          <div class="checkbox">
            <label>
              {!! Form::checkbox('sosial', 1, null) !!} Sosial
            </label>
          </div>
        </div>
        <br />

        <div class="">
          <strong>Keterangan</strong>
        </div>
        <div class="form-group">
          <textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3" autocomplete="off">{{ $bentukKekerasanActive->keterangan}}</textarea>
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