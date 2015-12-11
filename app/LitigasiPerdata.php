<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class LitigasiPerdata extends Model {

	protected $table = 'litigasi_perdata';
	
	protected $primaryKey = 'litigasi_perdata_id';
	
	public $timestamps = false;
	
	protected $fillable = ['kasus_id',
							'nomor_perkara',
							'pengadilan_wilayah_jenis',
							'pengadilan_wilayah_kabupaten',
							'nama_hakim',
							'cerai',
							'putusan_status',
							'diterima',
							'nafkah'];

	public function kasus()
	{
		return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
	}

}
