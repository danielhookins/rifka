<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class BentukKekerasan extends Model {

	protected $table = 'bentuk_kekerasan';
	protected $primaryKey = 'bentuk_id';
  public $timestamps = false;
	protected $fillable = ['kasus_id',
							'emosional',
							'fisik',
							'ekonomi',
							'seksual',
							'sosial',
							'keterangan'];

  public function kasus()
  {
      return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
  }

}
