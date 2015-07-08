<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Kasus extends Model {

	use SoftDeletes;
	use SearchableTrait;

	protected $table = 'kasus';
	protected $primaryKey = 'kasus_id';
	protected $fillable = [
        'jenis_kasus',
    	'hubungan',
    	'lama_hubungan',
    	'sejak_kapan',
    	'seberapa_sering',
    	'harapan_korban',
    	'rencana_korban',
    	'narasi'];
	protected $dates = ['deleted_at'];
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
	
	public function konselorKasus()
    {
        return $this->hasMany('rifka\KonselorKasus', 'kasus_id', 'kasus_id');
    }
    
	public function perkembangan()
    {
        return $this->hasMany('rifka\Perkembangan', 'kasus_id', 'kasus_id');
    }

    public function arsip()
    {
        return $this->hasMany('rifka\Arsip', 'kasus_id', 'kasus_id');
    }

    public function bentuk()
    {
        return $this->hasMany('rifka\BentukKekerasan', 'kasus_id', 'kasus_id');
    }

    public function faktorPemicu()
    {
        return $this->hasMany('rifka\FaktorPemicu', 'kasus_id', 'kasus_id');
    }

    public function layananDibutuhkan()
    {
        return $this->hasMany('rifka\LayananDibutuhkan', 'kasus_id', 'kasus_id');
    }

}
