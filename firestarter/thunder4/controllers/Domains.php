<?php namespace Firestarter\Thunder4\Controllers;

use Db;
use Log;
use Config;
use Redirect;
use BackendMenu;
use DirectoryIterator;
use Backend\Classes\Controller;
use Firestarter\Thunder4\Models\Group;
use Firestarter\Thunder4\Models\Domain;

class Domains extends Controller
{
	public $implement = [
		'Backend\Behaviors\ListController',
		'Backend\Behaviors\FormController',
		'Backend\Behaviors\RelationController'
	];
	
	public $listConfig = 'config_list.yaml';
	public $formConfig = 'config_form.yaml';
	public $relationConfig = 'config_relation.yaml';

	public function __construct()
	{
		parent::__construct();
		BackendMenu::setContext('Firestarter.Thunder4', 'main-thunder4-item', 'side-menu-item2');
	}

	public function onShowImportForm() {

		$data = [
			'groups'=>$this->getGroupOptions(),
			'themes'=>$this->getThemeOptions()
		];
		return $this->makePartial('import_form',$data);
	}

	public function getGroupOptions(){

		return Group::all()->lists('name', 'id');
		
	}

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

	public function onImportDomains() {

		$domains = array_filter(explode(PHP_EOL, post('domains')));

		if(empty($domains)) {
			Log::warning("Импорт доменов: Список пустой");
			return null; 
		}

		$group_id = (int)post('group_id');

		if(empty($group_id)) {
			Log::warning("Импорт доменов: Не указана группа для импорта");
			return null; 
		}

		$theme = (string) post('theme');

		if(empty($group_id)) {
			Log::warning("Импорт доменов: Не указан шаблон для сайтов");
			return null; 
		}

		Db::transaction(function () use ($domains, $group_id, $theme) {

			foreach ($domains as $one_domain) {

				if(!Domain::where('name','=', trim($one_domain))->exists()) {
					$domain = new Domain;
					$domain->name = trim($one_domain);	
					$domain->theme = $theme;				
					$domain->save();
					$domain->groups()->attach($group_id);
				}
			}

		});

		return Redirect::to('/backend/firestarter/thunder4/domains');

	}
}
