<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Log;

class AfterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
 
        //retrieve all executed queries
        $queries = DB::getQueryLog();
        Log::alert($queries);
       //code to save query logs in a file
    
        //return response
        return $response;


    }
}
