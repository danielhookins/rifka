<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class KlienKasus extends Model {

	//use SoftDeletes;

	protected $table = 'klien_kasus';
	protected $primaryKey = 'klien_kasus_id';
	protected $fillable = [
		'kasus_id',
		'klien_id',
		'jenis_klien'];
	//protected $dates = ['deleted_at'];
}
