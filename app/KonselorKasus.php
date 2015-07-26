<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class KonselorKasus extends Model {

	protected $table = 'konselor_kasus';
	protected $primaryKey = 'konselor_kasus_id';
	protected $fillable = [
		'konselor_id',
		'kasus_id',
		'legacy'];
	public $timestamps = false;


	public function legacyKonselor()
    {
        return $this->hasMany('rifka\Kasus', 'kasus_id', 'kasus_id');
    }

}
