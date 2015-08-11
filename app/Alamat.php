<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Alamat extends Model {

    use SearchableTrait;
	
    protected $table = 'alamat';
	protected $primaryKey = 'alamat_id';
	protected $fillable = [
        'klien_id',
        'alamat',
		'kecamatan',
		'kabupaten'];
	public $timestamps = false;
	
	protected $searchable = [
        'columns' => [
            'alamat' => 10,
            'kecamatan' => 7,
            'kabupaten' => 5,
        ],
    ];  

    public function klien()
    {
    return $this->belongsTo('rifka\Klien', 'klien_id', 'klien_id');
    }

}
