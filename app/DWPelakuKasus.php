<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class DWPelakuKasus extends Model {
	protected $table = 'dw_pelaku_kasus';
	protected $primaryKey = 'pelaku_kasus_id';
	protected $fillable = [
		'kasus_id',
		'klien_id',
		'nama_klien',
		'agama',
		'pendidikan',
		'pekerjaan',
		'penghasilan',
		'status_perkawinan',
		'kondisi_klien',
		'kabupaten',
		'jenis_kasus',
		'hubungan',
		'harapan_korban',
		'usia',
		'tahun'
	];
}
