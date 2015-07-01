@extends('layouts.records')

@section('content')
	
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			
			<div class="panel panel-danger">
				<div class="panel-heading">Error 404: Tidak Ditemukan</div>
				<div class="panel-body">
					<div class="form-group">
						<strong>Maaf,</strong> halaman yang diminta tidak ditemukan di server ini.
					</div>
					<div class="form-group">
						<a class="btn btn-default" href="{{route('home')}}">Pulang</a>
					</div>
				</div>
			</div>
		
		</div>
	</div>
	
@endsection