<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class KegiatanLitigasi extends Model {

	protected $table = 'kegiatan_litigasi';
	protected $primaryKey = 'kegiatan_litigasi_id';
  	public $timestamps = false;
	protected $fillable = ['litigasi_id',
							'tanggal',
							'kegiatan',
							'informasi'];

	public function litigasi()
  	{
      return $this->belongsTo('rifka\Litigasi', 'litigasi_id', 'litigasi_id');
  	}

}
