<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Arsip extends Model {

	use SearchableTrait;

	protected $table = 'arsip';
	protected $primaryKey = 'arsip_id';
	protected $fillable = [
        'kasus_id',
		'kasus_id',
        'no_reg',
        'media',
		'lokasi'];
	public $timestamps = false;
    protected $searchable = [
        'columns' => [
            'arsip.no_reg' => 10,
            'kasus.kasus_id' => 6,
        ],
        'joins' => [
            'kasus' => ['arsip.kasus_id','kasus.kasus_id']
        ],
    ];

    public function kasus()
    {
        return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
    }

}
