<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class KonsPsikologi extends Model {

	protected $table = 'kons_psikologi';
	protected $primaryKey = 'kons_psikologi_id';
	protected $fillable = ['kasus_id',
							'tanggal',
							'keterangan'];
	public $timestamps = false;

  public function kasus()
  {
      return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
  }

}
