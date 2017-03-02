<?php namespace Firestarter\Thunder4\Console;

use DB;
use Log;
use Twig;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Illuminate\Console\Command;

use Firestarter\Thunder4\Models\Group;
use Firestarter\Thunder4\Models\Article;
use Firestarter\Thunder4\Models\Keyword;
use Firestarter\Thunder4\Models\Category;
use Firestarter\Thunder4\Models\Template;

use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class SeSnippets extends Command
{
	/**
	 * @var string The console command name.
	 */
	protected $name = 'thunder4:sesnippets';

	/**
	 * @var string The console command description.
	 */
	protected $description = 'Get Search Engines Snippets For Keyword';

	/**
	 * Execute the console command.
	 * @return void
	 */
	public function fire()
	{
		$se = $this->option('se');

		if($se !== 'bing') {
			Log::warning('Search engine is not a Bing'); exit();
		}

		try {
			$kg = Keyword::findOrFail($this->option('kg'));
		} catch (ModelNotFoundException $e) {
			Log::warning($this->getName().' No Keyword Group with ID '.$this->option('kg'));	exit();	  	
		}

		if(is_null($kg->files)){
			Log::warning($this->getName().' Keywords Group '.$kg->name.' has no FIles'); exit();
		};

		try {
			$at = Template::findOrFail($this->option('at'));
		} catch (ModelNotFoundException $e) {
			Log::warning($this->getName().' No Article Template with ID '.$this->option('at'));	exit();	  	
		}

		if(Category::count() === 0) {
			Log::warning($this->getName().' No categories Exists'); exit();
		}

		$files = [];

		foreach ($kg->files as $file) {
			$files[] = $file->getLocalPath();
		}

		$rand_file = $files[array_rand($files)];

		$keyword = $this->getRandLine($rand_file, 1);

		if(is_null($keyword)){
			Log::warning($this->getName().' Keyword is empty in file '.$rand_file);
		};

		$client = new Client();

		$lang = 'ru';

		// Initiate each request but do not block
		$promises = [
			'bing' => $client->getAsync('http://www.bing.com/search?format=rss&q='.urlencode($keyword).'+language:'.$lang),
			//'mail.ru'   => $client->getAsync('http://mail.ru'),
		];

		$results = Promise\settle($promises)->wait(true);

		$snippets = [];

		if($results['bing']['value']->getStatusCode() !== 200 ) {
			$this->output->writeln( $this->getName().'  bing '.$results['bing']['value']->getStatusCode());
			Log::warning($this->getName().'  bing '.$results['bing']['value']->getStatusCode());
		}

		$body = $results['bing']['value']->getBody()->getContents();

		if(empty($body)) {
			$this->output->writeln($this->getName().'  bing '.$body);
			Log::warning($this->getName().'  bing '.$body);
		}

		$client = null;

		$random_category = Category::all()->random(1);

		$data = [
			'keyword' => $keyword, 
			'snippets' => $this->getBingSnippets($body)
		];

		$article = new Article;
		$article->category_id = $random_category->id;
		$article->domain_id = $random_category->domain_id;
		$article->title = Twig::parse($at->title_template, $data);
		$article->keyword = $keyword;
		$article->description = $keyword;
		$article->body = Twig::parse($at->template, $data);

		$article->save();

		exit();
	}

	/**
	 * Get the console command arguments.
	 * @return array
	 */
	protected function getArguments()
	{
		return [];
	}

	/**
	 * Get the console command options.
	 * @return array
	 */
	protected function getOptions()
	{
		return [
			['se', null, InputOption::VALUE_REQUIRED, 'Search engines for grab snippets', 'bing'],
			['sg', null, InputOption::VALUE_REQUIRED, 'Sites group ID to get random site', '1'],
			['kg', null, InputOption::VALUE_REQUIRED, 'Keywords group ID to get random keyword', '1'],
			['at', null, InputOption::VALUE_REQUIRED, 'Article template view ID', '1'],
		];
	}

	public function getPublicOptions(){
		
		return $this->getOptions();
	}

	protected function getBingSnippets($body) {

		$items = [];

		$rss = simplexml_load_string($body, null, LIBXML_NOCDATA);  

		foreach ($rss->channel->item as $item) {
			$items[] = (array)$item; 
		}

		return (array)$items;
	}

	protected function getRandLine($filename = null, $count = PHP_INT_MAX) {

		if(file_exists($filename) && is_readable($filename)) {

			$lines = file($filename);
			$lines = array_map('trim', $lines);
			shuffle($lines); 
			$rand_lines = array_slice($lines, 0, intval($count));

			if($count == 1) {
				return $rand_lines[0];
			}else{
				return $rand_lines;
			}

		} else {
			
			return null;
		}           
	}
}
