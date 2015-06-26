<h2>Klien Baru</h2>

<div class="row">
	<div class="hidden-xs col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
	@include('klien.partials.form-create.step-wizard')
	</div>
</div>

{!! Form::open(array('route' => 'klien.store')) !!}
<input name="returnPage" type="hidden" value="{{ $returnPage or 'klien' }}">
{!! Form::token() !!}

<div class="row setup-content" id="step-1">
  <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 well">
		@include('klien.partials.form-create.pribadi')
    <button class="btn btn-primary nextBtn pull-right" type="button" >Lanjut</button>
  </div>
</div>

<div class="row setup-content" id="step-2">
  <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 well">
			@include('klien.partials.form-create.kontak')
      <button class="btn btn-primary nextBtn pull-right" type="button" >Lanjut</button>
  </div>
</div>

<div class="row setup-content" id="step-3">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 well">
        @include('klien.partials.form-create.tambahan')
        {!! Form::submit('Selesai', array('class' => 'btn btn-success pull-right')) !!}
    </div>
</div>

{!! Form::close() !!}