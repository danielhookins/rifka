<?php

namespace rifka;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Activity';

	protected $primaryKey = 'activity_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id',
		'kasus_id',
		'klien_id',
		'action'];
	
	/**
     * Get the user that owns the activity.
     */
    public function user()
    {
        return $this->belongsTo('rifka\User', 'user_id');
    }

}
