<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class LayananDibutuhkan extends Model {

	protected $table = 'layanan_dibutuhkan';
	protected $primaryKey = 'layanan_dbth_id';

	/**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['kasus_id',
							'jenis_layanan',
							'status'];

  public function kasus()
  {
      return $this->belongsTo('rifka\Kasus', 'kasus_id', 'kasus_id');
  }

}
