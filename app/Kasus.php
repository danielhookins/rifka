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

	public function klienKasus()
    {
        return $this->belongsToMany('rifka\Klien', 'klien_kasus', 'kasus_id', 'klien_id')->withPivot('jenis_klien');
    }

    public function arsip()
    {
        return $this->hasMany('rifka\Arsip', 'kasus_id', 'kasus_id');
    }

    public function bentuk()
    {
        return $this->hasMany('rifka\BentukKekerasan', 'kasus_id', 'kasus_id');
    }

}
