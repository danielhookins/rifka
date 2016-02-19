<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model {

    protected $table = 'alamat';
	protected $primaryKey = 'alamat_id';
	protected $fillable = [
        'alamat',
		'kecamatan',
		'kabupaten',
        'provinsi'];
	public $timestamps = false;

    public function alamatKlien()
    {
      return $this->belongsToMany('rifka\Klien', 'alamat_klien', 'klien_id', 'alamat_id')->withPivot('jenis');
    }

}
