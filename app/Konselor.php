<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Konselor extends Model {

	protected $table = 'konselor';
	protected $primaryKey = 'konselor_id';
	protected $fillable = ['nama_konselor',
							'user_id'];
	public $timestamps = false;
	
	
	public function konselorKasus()
    {
        return $this->belongsToMany('rifka\Kasus', 'konselor_kasus', 'konselor_id', 'kasus_id');
    }
}
