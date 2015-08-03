<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Litigasi extends Model {

	protected $table = 'litigasi';
	protected $primaryKey = 'litigasi_id';
  public $timestamps = false;
	protected $fillable = ['kasus_id',
							'jenis_litigasi',
							'udang_digunakan',
							'kepolisian_wilayah',
							'nama_penyidik',
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
