<div class="panel panel-primary">
	<div class="panel-heading">Masuk</div>
	<div class="panel-body">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Perhatian!</strong> Ada masalah dengan memasukkan Anda.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="form-group">
				<label class="col-md-4 control-label">Alamat E-Mail</label>
				<div class="col-md-6">
					<input type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="off">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 control-label">Kata Sandi</label>
				<div class="col-md-6">
					<input type="password" class="form-control" name="password" autocomplete="off">
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="remember"> Tetap masuk
						</label>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<button type="submit" class="btn btn-primary">Masuk</button>
				</div>
			</div>

		</form>
	</div>
</div>