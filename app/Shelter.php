<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Shelter extends Model {

	protected $table = 'shelter';
	protected $primaryKey = 'shelter_id';
	protected $fillable = ['kasus_id',
							'mulai_tanggal',
							'sampai_tanggal',
							'keterangan'];
	public $timestamps = false;

  public function kasus()
  {
      return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
  }

}
