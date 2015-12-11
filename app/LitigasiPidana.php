<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class LitigasiPidana extends Model {

	protected $table = 'litigasi_pidana';
	
	protected $primaryKey = 'litigasi_pidana_id';
	
	public $timestamps = false;
	
	protected $fillable = ['kasus_id',
							'pidana_jenis',
							'undang_digunakan',
							'kepolisian_wilayah',
							'nama_penyidik',
							'nomor_perkara',
							'pengadilan_wilayah',
							'nama_hakim',
							'nama_jaksa',
							'tuntutan',
							'putusan'];

	public function kasus()
	{
		return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
	}

}
