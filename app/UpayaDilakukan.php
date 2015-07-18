<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class UpayaDilakukan extends Model {

	protected $table = 'upaya_dilakukan';
	protected $primaryKey = 'upaya_id';
  public $timestamps = false;
	protected $fillable = ['kasus_id',
							'jenis_upaya',
							'hasil'];

  public function kasus()
  {
      return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
  }

}
