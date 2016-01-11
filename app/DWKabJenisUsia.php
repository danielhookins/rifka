<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class DWKabJenisUsia extends Model {

	//use SoftDeletes;

	protected $table = 'dw_kab_jenis_usia';
	protected $primaryKey = 'kab_jenis_usia_id';
	protected $fillable = [
		'kasus_id',
		'klien_id',
		'kabupaten',
		'jenis_kasus',
		'usia',
		'tahun'
		];
	//protected $dates = ['deleted_at'];
}
