<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class IndexAlamat extends Model
{
  
  use SearchableTrait;

  protected $table = 'index_alamat';
	protected $primaryKey = 'index_alamat_id';
	protected $fillable = [
							'klien_id',
							'alamat',
							'kecamatan',
							'kabupaten',
							'provinsi',
							'jenis_alamat'];
  public $timestamps = false;
  protected $searchable = [
      				'columns' => [
			          'index_klien.nama_klien' => 10,
			          'index_alamat.alamat' => 4,
			          'index_alamat.kecamatan' => 5,
			          'index_alamat.kabupaten' => 4,
			          'index_alamat.provinsi' => 3,
					      ],
					      'joins' => [
					            'index_klien' => ['index_alamat.klien_id','index_klien.klien_id']
				        ],
  ];

  public function klien()
    {
        return $this->belongsTo('rifka\IndexKlien', 'klien_id', 'klien_id');
    }

}
