<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Alamat extends Model {

    use SearchableTrait;
	
    protected $table = 'alamat';
	protected $primaryKey = 'alamat_id';
	protected $fillable = [
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

    public function alamatKlien()
    {
      return $this->belongsToMany('rifka\Klien', 'alamat_klien', 'klien_id', 'alamat_id')->withPivot('jenis');
    }

}
