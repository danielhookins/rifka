<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class IndexSearch extends Model
{
  
  protected $table = 'index_search';
	protected $primaryKey = 'index_id';
	protected $fillable = [
							'klien_id',
		          'nama_klien',
		          'kelamin',
		          'email',
		          'no_telp',
		          'kasus_id',
		          'jenis_kasus',
		          'tahun', 
		          'alamat_id',
		          'kabupaten',
		          'kecamatan', 
		          'alamat',
		          'arsip_id',
		          'no_reg',
		          'media'];
  public $timestamps = false;

}
