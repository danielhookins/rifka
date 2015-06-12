<!-- 
	TODO: use css instead of inline styling 
-->
@extends('layouts.master')

@section('content')
  <div class="">
    <h1>Changelog</h1>
    <p>Log of changes made to the system.</p>

    <table class="table table-hover">
    	<tr>
    		<th>Date</th>
    		<th>Changes</th>
    		<th>Developer</th>
    	</tr>
    	<tr>
    		<td>[20150513]</td>
    		<td>
    			<ul style="list-style-position:inside;padding-left:0;">
    				<li>Add Pelaku-Kasus table</li>
    			</ul>
    		</td>
    		<td>
    			<a href="mailto:daniel@hookins.net">Daniel Hookins</a>
    		</td>
    	</tr>
    </table>
  </div>
 @endsection