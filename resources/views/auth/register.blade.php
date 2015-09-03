@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Minta Login</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Perhatian.</strong> Ada masalah dengan input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group 
						@if($errors->has('name')) has-error @endif">
							<label class="col-md-4 control-label">Nama</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="off">
								@if($errors->has('name'))
									<p class="help-block">
										{{ $errors->first('name') }}
									</p>
								@endif
							</div>
						</div>

						<div class="form-group 
						@if($errors->has('email')) has-error @endif">
							<label class="col-md-4 control-label">Alamat E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="off">
								@if($errors->has('email'))
									<p class="help-block">
										{{ $errors->first('email') }}
									</p>
								@endif
							</div>
						</div>

						<div class="form-group 
						@if($errors->has('password')) has-error @endif">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" autocomplete="off">
								@if($errors->has('password'))
									<p class="help-block">
										{{ $errors->first('password') }}
									</p>
								@endif
							</div>
						</div>

						<div class="form-group 
						@if($errors->has('password_confirmation')) has-error @endif">
							<label class="col-md-4 control-label">Confirmasi Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation" autocomplete="off">
								@if($errors->has('password_confirmation'))
									<p class="help-block">
										{{ $errors->first('password_confirmation') }}
									</p>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Minta Log-in
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
