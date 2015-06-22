<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class KlienKasus extends Model {

	protected $table = 'klien_kasus';
	protected $primaryKey = 'klien_kasus_id';
	protected $fillable = ['kasus_id',
							'klien_id',
							'jenis_klien'];
}
