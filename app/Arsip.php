<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model {

	protected $table = 'arsip';
	protected $primaryKey = 'arsip_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['kasus_id',
							'kasus_id',
							'lokasi'];

    public function kasus()
    {
        return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
    }

}
