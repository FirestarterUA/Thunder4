<?php namespace Firestarter\Thunder4\Models;

use Model;

/**
 * Model
 */
class Keyword extends Model
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
	public $table = 'firestarter_thunder4_keywords';

	public $attachMany = [
		'files' => ['System\Models\File', 'public' => false]
	];
}