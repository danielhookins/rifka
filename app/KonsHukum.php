<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class KonsHukum extends Model {

	protected $table = 'kons_hukum';
	protected $primaryKey = 'kons_hukum_id';
	protected $fillable = ['kasus_id',
							'tanggal',
							'keterangan'];
	public $timestamps = false;

  public function kasus()
  {
      return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
  }

}
