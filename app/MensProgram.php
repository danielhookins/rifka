<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class MensProgram extends Model {

	protected $table = 'mens_program';
	protected $primaryKey = 'mens_program_id';
	protected $fillable = ['kasus_id',
							'tanggal',
							'keterangan'];
	public $timestamps = false;

  public function kasus()
  {
      return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
  }

}
