@if(isset($user) && $user->jenis != "Front Office")
<div class="form-group hidden-sm hide-short">
	<h3>Klien Baru</h3>
	<p>Menambahkan klien ke database.</p>
</div>
@endif

<div class="form-group hidden-xs hidden-sm hide-short" style="padding-top:35px;">
</div>

<div class="form-group">
	<a href="klien/create" role="button" class="btn btn-default form-control">
	  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Menambahkan Klien Baru
	</a>	
</div>
