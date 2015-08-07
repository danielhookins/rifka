<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Medis extends Model {

	protected $table = 'medis';
	protected $primaryKey = 'medis_id';
	protected $fillable = ['kasus_id',
							'tanggal',
							'jenis_medis',
							'keterangan'];
	public $timestamps = false;

  public function kasus()
  {
      return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
  }

}
