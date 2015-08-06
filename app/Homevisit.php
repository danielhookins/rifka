<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Homevisit extends Model {

	protected $table = 'homevisit';
	protected $primaryKey = 'homevisit_id';
	protected $fillable = ['kasus_id',
							'tanggal',
							'keterangan'];
	public $timestamps = false;

  public function kasus()
  {
      return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
  }

}
