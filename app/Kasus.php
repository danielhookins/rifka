<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Kasus extends Model {

	protected $table = 'kasus';
	protected $primaryKey = 'kasus_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['jenis_kasus',
							'hubungan',
							'lama_hubungan',
							'sejak_kapan',
							'seberapa_sering',
							'harapan_korban',
							'rencana_korban',
							'narasi'];

}
