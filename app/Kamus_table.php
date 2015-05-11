<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Kamus_table extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'kamus_tables';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'type', 'description'];

}
