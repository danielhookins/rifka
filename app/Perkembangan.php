<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Perkembangan extends Model {
	
  protected $table = 'perkembangan';
	protected $primaryKey = 'perkembangan_id';
	protected $fillable = [
		'kasus_id',
		'tanggal',
		'intervensi',
    'kesimpulan',
    'kesepakatan',
    'deskripsi'];
	public $timestamps = false;

	public function kasus()
  {
    return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
  }

}
