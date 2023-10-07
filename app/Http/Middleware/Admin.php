<?php
/**
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/24/20, 3:09 PM
 * Last Modified: 1/20/20, 4:41 AM
 * Project Name: Wafaq
 * File Name: Admin.php
 */


declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if (auth()->guard('admin')->user()) {
            return $next($request);
        }
       if (auth()->guard('user')->user()) {
            return $next($request);
        }
        return redirect()->route('admin.dashboard.index')->with('error', 'You have not admin access');
        //return $next($request);
    }
}
