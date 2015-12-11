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
        'jenis_lama_hub',
    	'sejak_kapan',
    	'seberapa_sering',
        'jenis_seberapa_sering',
    	'harapan_korban',
    	'rencana_korban',
    	'narasi',
        'created_at'];
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
        return $this->belongsToMany('rifka\Klien', 'klien_kasus', 'kasus_id', 'klien_id')->withPivot('jenis_klien', 'deleted_at');
    }
	
    public function konselorKasus()
    {
        return $this->belongsToMany('rifka\Konselor', 'konselor_kasus', 'kasus_id', 'konselor_id');
    }
    
	public function perkembangan()
    {
        return $this->hasMany('rifka\Perkembangan', 'kasus_id', 'kasus_id');
    }

    public function arsip()
    {
        return $this->hasMany('rifka\Arsip', 'kasus_id', 'kasus_id');
    }

    public function bentukKekerasan()
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
    
    public function upayaDilakukan()
    {
        return $this->hasMany('rifka\UpayaDilakukan', 'kasus_id', 'kasus_id');
    }

    public function dampak()
    {
        return $this->hasMany('rifka\Dampak', 'kasus_id', 'kasus_id');
    }

    public function kasusPentutup()
    {
        return $this->hasOne('rifka\KasusPentutup', 'kasus_id', 'kasus_id');
    }

    public function litigasiPidana()
    {
        return $this->hasMany('rifka\LitigasiPidana', 'kasus_id', 'kasus_id');
    }

    public function litigasiPerdata()
    {
        return $this->hasMany('rifka\LitigasiPerdata', 'kasus_id', 'kasus_id');
    }

    public function konsPsikologi()
    {
        return $this->hasMany('rifka\KonsPsikologi', 'kasus_id', 'kasus_id');
    }

    public function konsHukum()
    {
        return $this->hasMany('rifka\KonsHukum', 'kasus_id', 'kasus_id');
    }

    public function homevisit()
    {
        return $this->hasMany('rifka\Homevisit', 'kasus_id', 'kasus_id');
    }

    public function supportGroup()
    {
        return $this->hasMany('rifka\SupportGroup', 'kasus_id', 'kasus_id');
    }

    public function mensProgram()
    {
        return $this->hasMany('rifka\MensProgram', 'kasus_id', 'kasus_id');
    }

    public function rujukan()
    {
        return $this->hasMany('rifka\Rujukan', 'kasus_id', 'kasus_id');
    }

    public function medis()
    {
        return $this->hasMany('rifka\Medis', 'kasus_id', 'kasus_id');
    }

    public function mediasi()
    {
        return $this->hasMany('rifka\Mediasi', 'kasus_id', 'kasus_id');
    }

    public function shelter()
    {
        return $this->hasMany('rifka\Shelter', 'kasus_id', 'kasus_id');
    }

    public function symptom()
    {
        return $this->hasMany('rifka\Symptom', 'kasus_id', 'kasus_id');
    }

}
