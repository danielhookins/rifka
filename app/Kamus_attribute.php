<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Kamus_attribute extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'kamus_attributes';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['table_id', 'name', 'primary_key', 'foreign_key', 'description', 'example'];
}
