<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class DWKabJenisUsia extends Model {
	protected $table = 'dw_kab_jenis_usia';
	protected $primaryKey = 'kab_jenis_usia_id';
	protected $fillable = [
		'kasus_id',
		'klien_id',
		'nama_klien',
		'kabupaten',
		'jenis_kasus',
		'usia',
		'tahun'
		];
}
