<?php

namespace App\Http\Middleware;
use Closure;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
	//private $openRoutes = ['sendmail'];
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = ['sendmail'];

    public function handle($request, Closure $next)
    {
        
	    foreach($this->except as $route) {

	      if ($request->is($route)) {
	        return $next($request);
	      }
	 	}
       return parent::handle($request, $next);
  }
}
