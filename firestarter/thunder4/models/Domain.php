<?php namespace Firestarter\Thunder4\Models;

use Model;
use Config;
use DirectoryIterator;

/**
 * Model
 */
class Domain extends Model
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
	public $table = 'firestarter_thunder4_domains';



	public $belongsToMany = [
		'groups' => [
			'Firestarter\Thunder4\Models\Group',
			'table'=>'firestarter_thunder4_domain_group'
		]
	];

	public $hasMany = [
		'categories' =>['Firestarter\Thunder4\Models\Category']
	];

	public function getThemeOptions()
	{
		$path = base_path().Config::get('cms.themesPath');
		
		$themeDirs = [];

		foreach (new DirectoryIterator($path) as $file) {
			if ($file->isDot()) {
				continue;
			}
			if ($file->isDir()) {
				$name = $file->getBasename();
				$themeDirs[$name] = $name;
			}
		}

		return $themeDirs;
	}


}