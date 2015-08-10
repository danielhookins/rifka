<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Mediasi extends Model {

	protected $table = 'mediasi';
	protected $primaryKey = 'mediasi_id';
	protected $fillable = ['kasus_id',
							'tanggal',
							'hasil',
							'keterangan'];
	public $timestamps = false;

  public function kasus()
  {
      return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
  }

}
