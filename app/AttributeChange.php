<?php

namespace rifka;

use Illuminate\Database\Eloquent\Model;

class AttributeChange extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Attribute_Change';

	protected $primaryKey = 'attribute_change_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id',
		'kasus_id',
		'klien_id',
		'attribute_name',
		'old_attribute_value',
		'new_attribute_value'];

}
