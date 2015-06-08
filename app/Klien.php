<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Klien extends Model {

	use SearchableTrait;
	
	protected $table = 'klien';
	protected $primaryKey = 'klien_id';
	protected $fillable = ['jenis_klien',
							'nama_klien',
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
    protected $searchable = [
        'columns' => [
            'klien.klien_id' => 10,
            'klien.nama_klien' => 10,
            'klien.email' => 7,
            'klien.no_telp' => 7
        ]
    ];

	public function klienKasus()
    {
        return $this->belongsToMany('rifka\Kasus', 'klien_kasus', 'klien_id', 'kasus_id')->withPivot('jenis_klien');
    }

    public function alamatKlien()
    {
        return $this->belongsToMany('rifka\Alamat', 'alamat_klien', 'klien_id', 'alamat_id')->withPivot('created_at', 'updated_at');
    }

}
