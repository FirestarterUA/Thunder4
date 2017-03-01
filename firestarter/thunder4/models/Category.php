<?php namespace Firestarter\Thunder4\Models;

use Model;
use Firestarter\Thunder4\Models\Domain;

/**
 * Model
 */
class Category extends Model
{
	use \October\Rain\Database\Traits\Validation;
	use \October\Rain\Database\Traits\NestedTree;
	use \October\Rain\Database\Traits\Sluggable;
	
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

	public $table = 'firestarter_thunder4_categories';

	public $belongsTo = [
		'domain' => 'Firestarter\Thunder4\Models\Domain'
	];

	public $hasMany = [
		'articles' => 'Firestarter\Thunder4\Models\Article'
	];

	protected $slugs = ['slug' => 'name'];

	protected function getDepthIndicators($depth = 0, $indicators = '')
	{
		if ($depth < 1) {
			return $indicators;
		}
		return $this->getDepthIndicators(--$depth, $indicators . '-');
	}

	public function getParentIdOptions() {
			
		if($this->domain_id == null) return  []; 

		$items = $this->where('domain_id', $this->domain_id )->get();

		$output = ['' => '-- none --'];

		foreach ($items as $item) {

			$depthIndicator = $this->getDepthIndicators($item->nest_depth);

			$output["$item->id"] = $depthIndicator . ' ' . $item->name;
		}

		return $output;
	}

	public function getDomainIdOptions(){

		return Domain::all()->lists('name', 'id');
		
	}


}