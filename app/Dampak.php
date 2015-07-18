<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Dampak extends Model {

	protected $table = 'dampak';
	protected $primaryKey = 'dampak_id';
  public $timestamps = false;
	protected $fillable = ['kasus_id',
							'jenis_dampak',
							'keterangan'];

  public function kasus()
  {
      return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
  }

}
