<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class KasusPentutup extends Model {

	protected $table = 'kasus_pentutup';
	protected $primaryKey = 'kasus_pentutup_id';
	protected $fillable = ['kasus_id',
							'evaluasi_kons_id',
							'evaluasi_akhir_id',
							'tanggal'];
	public $timestamps = false;

	public function kasus()
  {
      return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
  }

  public function evaluasiKons()
  {
      return $this->belongsTo('rifka\Konsellor', 'evaluasi_kons_id', 'konsellor_id');
  }

  public function evaluasiAkhir()
  {
      return $this->belongsTo('rifka\Konsellor', 'evaluasi_akhir_id', 'konsellor_id');
  }

}