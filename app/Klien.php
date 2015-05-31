<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Klien extends Model {

	protected $table = 'klien';
	protected $primaryKey = 'klien_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['jenis_klien',
							'nama_klien',
							'tempat_lahir',
							'tanggal_lahir',
							'no_telp',
							'alamat_ktp',
							'alamat_domisili',
							'pendidikan',
							'tamat',
							'agama',
							'pekerjaan',
							'jabatan',
							'penghasilan',
							'jumlah_tanggungan',
							'status_perkawinan',
							'jumlah_anak',
							'kondisi_kilen',
							'dirujuk_oleh',
							'created_at',
							'updated_at'];

	public function korbanKasus()
    {
        return $this->belongsToMany('rifka\Kasus', 'korban_kasus', 'korban_id', 'kasus_id');
    }

}
