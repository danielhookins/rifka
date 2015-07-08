<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class FaktorPemicu extends Model {

	protected $table = 'faktor_pemicu';
	protected $primaryKey = 'pemicu_id';
	protected $fillable = ['kasus_id',
							'jenis_pemicu',
							'keterangan'];

    public function kasus()
    {
        return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
    }

}
