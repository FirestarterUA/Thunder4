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

	protected $slugs = ['slug' => 'title'];

	/**
	 * @var string The database table used by the model.
	 */
	public $table = 'firestarter_thunder4_articles';

	protected function getDepthIndicators($depth = 0, $indicators = '') {
		if ($depth < 1) {
			return $indicators;
		}
		return $this->getDepthIndicators(--$depth, $indicators . '-');
	}

	public function getCategoryIdOptions(){

		$items = Category::where('domain_id', $this->domain )->get();		

		$output=[];

		foreach ($items as $item) {

			$depthIndicator = $this->getDepthIndicators($item->nest_depth);

			$output["$item->id"] = $depthIndicator . ' ' . $item->name;
		}

		return $output;
	}

	public function getDomainOptions() {

		$domains = [];

		if($this->category) {

			$this->domain = (int) $this->category->domain->id;

			$domains[$this->category->domain->id] = $this->category->domain->name;
		}

		foreach(Domain::all()->lists('name', 'id') as $key => $value) {
			$domains[$key] = $value;
		}

		return $domains;

	}

	public function beforeSave() {
	   	unset($this->domain);
	}

	public $belongsTo = [
		'category' => ['Firestarter\Thunder4\Models\Category', 'key' => 'category_id']
	];

}