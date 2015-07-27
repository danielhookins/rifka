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

}
