<!-- 
	TODO: use css instead of inline styling 
-->
@extends('layouts.master')

@section('content')
  <div class="">
    <h1>Kamus Data</h1>
    <p>This page lists all of the descriptions of the tables and fields in the Rifka Annisa case database.</p>
  </div>
  
  <!-- Table Start -->
  @foreach ($tables as $table)
  	<div class="container" style="padding:2px 10px 5px 10px;border-style:solid;border-width:1px;margin-bottom:5px;">
		<h3>{{ $table->name }}</h3>
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
		</table>
	  </div>
	  <!-- Table End -->
	@endforeach

@endsection