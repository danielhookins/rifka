<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model {

	
    protected $table = 'alamat';
	protected $primaryKey = 'alamat_id';
	protected $fillable = ['alamat',
							'kecamatan',
							'kabupaten'];
	protected $searchable = [
        'columns' => [
            'alamat.alamat' => 10,
            'alamat.kecamatan' => 7,
            'alamat.kabupaten' => 5,
        ],
        'joins' => [
            'alamat_klien' => ['alamat_klien.alamat_id', 'alamat.alamat_id'],
            'klien' => ['klien.klien_id', 'alamat_klien.klien_id']
        ],
    ];

    public $timestamps = false;

	public function alamatKlien()
    {
        return $this->belongsToMany('rifka\Klien', 'alamat_klien', 'alamat_id', 'klien_id')->withPivot('created_at', 'updated_at');
    }

}
