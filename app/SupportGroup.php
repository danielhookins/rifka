<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class SupportGroup extends Model {

	protected $table = 'support_group';
	protected $primaryKey = 'support_group_id';
	protected $fillable = ['kasus_id',
							'tanggal',
							'keterangan'];
	public $timestamps = false;

  public function kasus()
  {
      return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
  }

}
