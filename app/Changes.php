<?php namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Changes extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'changes';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['description', 'developer'];

}
