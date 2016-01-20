<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class IndexKlien extends Model
{
  
	use SearchableTrait;

  protected $table = 'index_klien';
	protected $primaryKey = 'index_klien_id';
	protected $fillable = [
							'klien_id',
							'nama_klien',
							'no_telp',
							'email'];
  public $timestamps = false;
  protected $searchable = [
      				'columns' => [
			          'index_klien.nama' => 10,
			          'index_klien.email' => 7,
			          'index_klien.no_telp' => 7
      ]
  ];

  public function alamat()
  {
      return $this->hasMany('rifka\IndexAlamat', 'klien_id', 'klien_id');
  }

}
