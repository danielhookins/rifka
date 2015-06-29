@extends('layouts.master')

@section('nav')
<div class="nav-kamus">
	<div class="nav-kamus-title">
		<h3>Tables</h3>
	</div>
	@foreach ($tabletypes as $tabletype)
	<div class="panel panel-success">
		<div class="panel-heading">
			<h4 class="panel-title">{{ $tabletype->type }}</h4>
		</div>
		<ul class="list-group">
		@foreach ($tables as $table) 
			@if ($table->type == $tabletype->type)
				<li class="list-group-item"><a href="#{{ $table->name }}">{{ $table->name }}</a></li>
			@endif
		@endforeach
		</ul>
	</div>
	@endforeach
</div>
@endsection

@section('content')
	<div class="">
		<h1>Kamus Data</h1>
		<p>This page lists all of the descriptions of the tables and fields in the Rifka Annisa case database.</p>
	</div>
	
	@foreach ($tables as $table)
		<div class="panel panel-default">
			
			<div class="panel-heading">
				<h3 class="panel-title strongLabel"><a class="in-link" name="{{ $table->name }}">{{ $table->name }}</a></h3>
			</div>
			
			<div class="panel-body">
				{{ $table->description }}
			</div>
			
			<table class="table table-hover">
				@foreach ($attributes as $attribute)
					@if($attribute->table == $table->name)
					<tr>
						<td>
							<strong>{{ $attribute->name }}</strong>
							<ul>
								@if($attribute->primary_key)
								<li>Primary Key</li>
								@endif
								@if($attribute->foreign_key)
								<li>Foreign Key ({{ $attribute->foreign_key }})</li>
								@endif
								<li>{{ $attribute->type }}</li>
							</ul>
						</td>
						<td>
							{!! $attribute->description !!}
							<p class="kamus-contoh"><strong>Contoh: </strong>{{ $attribute->example }}</p>
						</td>
					</tr>
					@endif
				@endforeach
			</table>
			<div class="panel-body">
				<tr><td colspan=2 class="text-right"><a class="btn btn-default pull-right" href="#">Kembali ke atas</a><div class="clearfix"></div></td></tr>
			</div>

		</div>
	@endforeach

@endsection