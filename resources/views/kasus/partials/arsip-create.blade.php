<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Informasi Arsip Kasus</h3>
  </div>
  <div class="panel-body">
    <div class="row">
      
      <div class="col-sm-12">
        
       <div class="form-group">
         {!! Form::label('no_reg', 'No Reg', array('class' => 'strongLabel')) !!}
         {!! Form::Number('no_reg', null, array('class' => 'form-control', 'autocomplete' => 'off')) !!}
       </div>
       <div class="form-group">
         {!! Form::label('media', 'Media', array('class' => 'strongLabel')) !!}
         {!! Form::select('media', array(
           'Media'       =>  'Media',
           'Tatap Muka'  =>  'Tatap Muka',
           'Telepon'     =>  'Telepon',
           'Outreach'    =>  'Outreach',
           'Email'       =>  'Email',
           'Internet'    =>  'Internet',
           'Surat'       =>  'Surat',
           'Lain'        =>  'Lain'
         ), null, array('class' => 'form-control'))!!}
       </div>
       <div class="form-group">
         {!! Form::label('lokasi', 'Lokasi', array('class' => 'strongLabel')) !!}
         {!! Form::Text('lokasi', null, array('class' => 'form-control', 'autocomplete' => 'off')) !!}
       </div>

      </div>
    </div>
  </div>
</div>