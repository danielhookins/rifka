<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Klien extends Model {

	use SoftDeletes;
	
	protected $table = 'klien';
	protected $primaryKey = 'klien_id';
	protected $fillable = ['jenis_klien',
							'nama_klien',
							'nama_orangtua',
							'kelamin',
							'tempat_lahir',
							'tanggal_lahir',
							'no_telp',
							'email',
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
							'kondisi_klien',
							'dirujuk_oleh',
							'created_at',
							'updated_at'];
    protected $dates = ['deleted_at'];

		public function klienKasus()
    {
      return $this->belongsToMany('rifka\Kasus', 'klien_kasus', 'klien_id', 'kasus_id')->withPivot('jenis_klien');
    }

		public function alamatKlien()
    {
      return $this->belongsToMany('rifka\Alamat', 'alamat_klien', 'klien_id', 'alamat_id')->withPivot('jenis');
    }

}
