<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Konselor extends Model {

	use SearchableTrait;

	protected $table = 'konselor';
	protected $primaryKey = 'konselor_id';
	protected $fillable = [
		'nama_konselor',
		'user_id'];
	protected $searchable = [
    'columns' => [
      'nama_konselor' => 10,
      'konselor_id' => 10]];

  public $timestamps = false;
	
  public function kasus()
  {
    return $this->belongsToMany('rifka\Kasus', 'konselor_kasus', 'konselor_id', 'kasus_id');
  }

}
