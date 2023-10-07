<?php
/**
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/28/19, 12:11 PM
 * Project Name: Wafaq
 * File Name: AuthController.php
 */

declare(strict_types=1);


namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

final class AuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new authentication controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getLogout']]);
        $this->middleware('auth:admin', ['only' => ['getLogout']]);
    }

    /**
     * Show the application login form.
     *
     * @return Factory|View
     */
    public function getLogin()
    {
        if (\Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard.index');
        }
        return view('backend.admin.auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param Request $request
     * @return RedirectResponse|Response
     * @throws ValidationException
     */
    public function loginAdmin(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        // Attempt to log the user in
        if (\Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard.index'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(trans('auth.failed'));
    }

    /**
     * Log the user out of the application.
     *
     * @return RedirectResponse
     */
    public function getLogout()
    {
        \Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    /**
     * Log the user out of the application.
     *
     * @return RedirectResponse
     */
    public function logout()
    {
        \Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
