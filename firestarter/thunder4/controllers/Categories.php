<?php namespace Firestarter\Thunder4\Controllers;


use Db;
use Log;
use App;
use Redirect;
use BackendMenu;
use Backend\Classes\Controller;
use Firestarter\Thunder4\Models\Category;
use Firestarter\Thunder4\Models\Domain;

class Categories extends Controller
{
	private $domain_id; 

	private $categories_path;

	public $implement = [
		'Backend\Behaviors\ListController',
		'Backend\Behaviors\FormController',
		'Backend\Behaviors\ReorderController'
		];
	
	public $listConfig = 'config_list.yaml';
	public $formConfig = 'config_form.yaml';
	public $reorderConfig = 'config_reorder.yaml';

	public function __construct()
	{
		parent::__construct();
		
		BackendMenu::setContext('Firestarter.Thunder4', 'main-thunder4-item', 'side-menu-item4');

		$this->categories_path = plugins_path().'/firestarter/thunder4/data/categories/';
	}

	public function reorder($domain_id = null)
	{
	    	if($domain_id===null) App::abort(404);
	    	$this->domain_id = $domain_id;
	    	$this->asExtension('ReorderController')->reorder();
	}

	public function reorderExtendQuery($query)
	{
	    	$query->where('domain_id','=',$this->domain_id);
	}

	public function onShowImportForm() {

		$data = [
			'categories_lists'=>$this->getCategoriesListsOptions()
		];
		return $this->makePartial('import_form',$data);
	}

	public function getCategoriesListsOptions()
	{
		return array_diff(scandir($this->categories_path), array('.', '..'));		
	}

	public function onImportCategories(){

		Db::transaction(function () {

			$empty_domains = [];

			foreach( Domain::all() as $domain){
				if ($domain->categories->isEmpty()) { 
					$empty_domains[] = $domain;
				}
			}

			$categories_files = $this->getCategoriesListsOptions();	

			$categories_file = $this->categories_path.$categories_files[post('categories_file')];

			if(!file_exists($categories_file) || !is_readable($categories_file)) {
				Log::warning("Импорт категорий: Отсутствует файл с категориями или он не доступен для чтения");
				return null; 
			}

			$categories_schema = empty(post('categories_schema')) ? "3:9:18" : post('categories_schema');

			$categories_exists = explode(PHP_EOL, file_get_contents($categories_file));

			$categories_schema  = explode(';', $categories_schema);

			$categories_exists_count = count($categories_exists);
					
			$categories_needed_count = array_sum($categories_schema); 

			if($categories_exists_count <= $categories_needed_count) {
						
				Log::warning("Импорт категорий: В файле не хватает категорий для вашей счемы");
				return null; 
			}

			foreach ($empty_domains as $domain) {

				foreach ($categories_schema as $level => $value) {
					
					shuffle($categories_exists);

					if($level ===0) {
						$global_parrents = [0];
					}
					
					$local_parrents = $global_parrents;

					$global_parrents = [];

					$i = 0;

					while ($i < $value) {
						
						$category = new Category;
						$category->name = $categories_exists[array_rand($categories_exists)];
						$category->parent_id = $local_parrents[array_rand($local_parrents)];
						$category->domain_id = $domain->id;
						$category->save();

						$global_parrents[] = $category->id;

						$i++;
					}
				}
			}

		});

		return Redirect::to('/backend/firestarter/thunder4/categories');

	}
}