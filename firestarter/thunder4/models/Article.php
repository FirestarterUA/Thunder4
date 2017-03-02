<?php namespace Firestarter\Thunder4\Models;

use Model;

use Firestarter\Thunder4\Models\Domain;
use Firestarter\Thunder4\Models\Category;

/**
 * Model
 */
class Article extends Model
{
	use \October\Rain\Database\Traits\Validation;
	use \October\Rain\Database\Traits\Sluggable;
	
	/*
	 * Validation
	 */
	public $rules = [
	];

	public $table = 'firestarter_thunder4_articles';

	public $belongsTo = [
		'category' => ['Firestarter\Thunder4\Models\Category', 'key' => 'category_id'],
		'domain' => ['Firestarter\Thunder4\Models\Domain', 'key' => 'domain_id'],
	];

	protected $slugs = ['slug' => 'title'];

	protected function getDepthIndicators($depth = 0, $indicators = '') {
		if ($depth < 1) {
			return $indicators;
		}
		return $this->getDepthIndicators(--$depth, $indicators . '-');
	}

	public function getCategoryIdOptions(){

		if($this->domain_id == null) return  []; 

		$items = Category::where('domain_id', $this->domain_id )->get();	

		$output = ['' => '-- none --'];

		foreach ($items as $item) {

			$depthIndicator = $this->getDepthIndicators($item->nest_depth);

			$output["$item->id"] = $depthIndicator . ' ' . $item->name;
		}

		return $output;
	}

	public function getDomainIdOptions() {

		return Domain::all()->lists('name', 'id');
	}

}