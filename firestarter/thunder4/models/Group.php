<?php namespace Firestarter\Thunder4\Models;

use Model;

/**
 * Model
 */
class Group extends Model
{
	use \October\Rain\Database\Traits\Validation;
	
	/*
	 * Disable timestamps by default.
	 * Remove this line if timestamps are defined in the database table.
	 */
	public $timestamps = false;

	/*
	 * Validation
	 */
	public $rules = [
	];

	/**
	 * @var string The database table used by the model.
	 */
	public $table = 'firestarter_thunder4_groups';



	public $hasMany = [
		'domains' =>[
			'Firestarter\Thunder4\Models\Domain', 
			'key'      => 'id'
		]
	];
}