<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model {

	protected $table = 'arsip';
	protected $primaryKey = 'arsip_id';
	protected $fillable = [
        'kasus_id',
		'kasus_id',
        'no_reg',
        'media',
		'lokasi'];
	public $timestamps = false;

    public function kasus()
    {
        return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
    }

}
