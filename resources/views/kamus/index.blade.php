<!-- 
	TODO: use css instead of inline styling 
-->
@extends('layouts.master')

@section('nav')
  <div>
  	<h3>Tables</h3>
 
	  @foreach ($tabletypes as $tabletype)
	  	<h4>{{ $tabletype->type }}</h4>
	  	<ul style="list-style-position:inside;padding-left:0;">
		  @foreach ($tables as $table)
		  
		  	@if ($table->type == $tabletype->type)
		  		<li>
					  <a href="#{{ $table->name }}">{{ $table->name }}</a>
					  <!-- {{ $table->description }} -->
					</li>
				@endif
		  @endforeach
			</ul>
	  @endforeach
  </div>

@endsection

@section('content')
  <div class="">
    <h1>Kamus Data</h1>
    <p>This page lists all of the descriptions of the tables and fields in the Rifka Annisa case database.</p>
  </div>
  
  <!-- Table Start -->
  @foreach ($tables as $table)
  	<div class="" style="padding:2px 10px 5px 10px;border-style:solid;border-width:1px;margin-bottom:5px;">
		<h3><a class="in-link" name="{{ $table->name }}">{{ $table->name }}</a></h3>
		<p>{{ $table->description }}</p>
		<table class="table table-hover">

	    @foreach ($attributes as $attribute)
	    	@if($attribute->table == $table->name)
	    	<!-- Attribute Start -->
				<tr>
					<td>
						<strong>{{ $attribute->name }}</strong>
						<ul style="list-style-position:inside;padding-left:0;">
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
						<p style="color:blue"><strong>Contoh: </strong>{{ $attribute->example }}</p>
					</td>
				</tr>
				<!-- Attribute End -->
	    	@endif
	    @endforeach
	    <tr><td></td><td class="text-right"><a href="#">Kembali ke atas</a></td></tr>
		</table>
	  </div>
	  <!-- Table End -->
	@endforeach

@endsection