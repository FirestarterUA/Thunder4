<?php
namespace Firestarter\Thunder4\MIddleware;

use Log;
use Closure;
use Cms\Classes\Theme;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Firestarter\Thunder4\Models\Domain;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CurrentDomainMiddleware
{
	public $currentDomain = null;

	public function handle($request, Closure $next)
	{
		$currentDomain = str_replace('www.', '', $request->getHttpHost());

		try {
			$currentDomain = Domain::where('name', '=' , $currentDomain)->firstOrFail();
		} catch (ModelNotFoundException $e) {
			return \Response::make('Page not found', 404);	
		}

		$newTheme = Theme::load($currentDomain->theme);

		if (!$newTheme->exists($currentDomain->theme)) {
			return die(sprintf('The theme %s does not exist.', $currentDomain->theme));
		}

		Theme::setActiveTheme($currentDomain->theme);

		$request->merge(["currentDomain" => $currentDomain]);

		return  $next($request);
	}

}