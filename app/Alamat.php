<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model {

	protected $table = 'alamat';
	protected $primaryKey = 'alamat_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['alamat',
							'kecamatan',
							'kabupaten'];

	public function alamatKlien()
    {
        return $this->belongsToMany('rifka\Klien', 'alamat_klien', 'alamat_id', 'klien_id')->withPivot('created_at', 'updated_at');
    }

}
