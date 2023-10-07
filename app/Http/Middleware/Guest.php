<?php
/**
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 1/4/20, 5:13 PM
 * Project Name: Wafaq
 * File Name: Authenticate.php
 */

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class Guest extends Middleware
{

        /**
         * Handle an incoming request.
         *
         * @param \Illuminate\Http\Request $request
         * @param \Closure $next
         * @param string|null $guard
         * @return mixed
         */
    // public function handle($request, Closure $next, $guard = null)
    public function handle($request, Closure $next, ...$auth)
    {
        if (\Auth::guard('user')->check()) {
            return redirect(url('/'));
        }

        return $next($request);
    }

}
