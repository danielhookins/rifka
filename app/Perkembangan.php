<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Perkembangan extends Model {
	
    protected $table = 'perkembangan';
	protected $primaryKey = 'perkembangan_id';
	protected $fillable = ['kasus_id',
							'tanggal',
							'intervensi',
                            'kesimpulan',
                            'kesepakatan'];
	public $timestamps = false;

	public function kasus()
    {
        /*
        return $this->belongsToMany('rifka\Klien', 'alamat_klien', 'alamat_id', 'klien_id')->withPivot('created_at', 'updated_at'); */
    }

}
