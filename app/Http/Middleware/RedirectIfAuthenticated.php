<?php
/**
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 2/1/20, 1:12 AM
 * Last Modified: 1/30/20, 11:41 PM
 * Project Name: Wafaq
 * File Name: RedirectIfAuthenticated.php
 */

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use App\Support\ApiHelper;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'admin':
                if (\Auth::guard('admin')->check()) {
                    return redirect()->route('admin.login');
                }
                break;
            case 'student':
                if (\Auth::guard('student')->check()) {
                    return redirect()->route('student.login.index');
                }
                break;
            case 'user':
                if (\Auth::guard('user')->check()) {
                    return redirect()->route('login');
                }
                break;
            default:
                break;
        }

        return $next($request);
    }
}
