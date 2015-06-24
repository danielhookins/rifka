<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Kasus extends Model {

	use SearchableTrait;

	protected $table = 'kasus';
	protected $primaryKey = 'kasus_id';
	protected $fillable = ['jenis_kasus',
							'hubungan',
							'lama_hubungan',
							'sejak_kapan',
							'seberapa_sering',
							'harapan_korban',
							'rencana_korban',
							'narasi'];
	protected $searchable = [
        'columns' => [
            'kasus.kasus_id' => 10,
            'arsip.no_reg' => 9,
            'kasus.jenis_kasus' => 5
        ],
        'joins' => [
            'arsip' => ['kasus.kasus_id','arsip.kasus_id']
        ],
    ];

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
