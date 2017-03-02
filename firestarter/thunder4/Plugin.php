<?php namespace Firestarter\Thunder4;

use Cms\Classes\CmsController;
use System\Classes\PluginBase;
use Firestarter\Thunder4\Models\Task;

class Plugin extends PluginBase
{
	
	public $require = ['October.Drivers'];

	public function boot() {
		CmsController::extend(function($controller) {
			$controller->middleware('Firestarter\Thunder4\MIddleware\CurrentDomainMiddleware');
		});
	}

	public function register() {
		$this->registerConsoleCommand('thunder4:sesnippets', 'Firestarter\Thunder4\Console\Sesnippets');
	}

	public function registerSchedule($schedule) {

		$tasks = Task::all();
				
		foreach ($tasks as $task) {

			switch ($task->is_console) {
				case 1:
					$schedule->command($task->command)->cron($task->cron);
					break;
				case 0:
					$schedule->exec($task->command)->cron($task->cron);
					break;
			}
		}	
	}
}
