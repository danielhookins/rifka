<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class AlamatKlien extends Model {

	protected $table = 'alamat_klien';
	protected $primaryKey = 'alamat_klien_id';
	protected $fillable = ['alamat_id',
							'klien_id'];
}
