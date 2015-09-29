<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model {

	protected $table = 'symptoms';
	protected $primaryKey = 'symptom_id';
	protected $fillable = [
        'kasus_id',
		'symptom_description'
        ];
	public $timestamps = false;

    public function kasus()
    {
        return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
    }

}
