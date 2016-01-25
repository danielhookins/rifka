<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class DWKorbanKasus extends Model {
	protected $table = 'dw_korban_kasus';
	protected $primaryKey = 'korban_kasus_id';
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
