<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Requests\Backend\PasswordRemindRequest;
use App\Http\Requests\Backend\PasswordResetRequest;
use App\Models\Admin;
use App\Notifications\ResetPasswordAdmin;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Http\Controllers\Controller;
use Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;
    protected $guard = 'admin';
    protected $broker = 'admins';

    /**
     * Create a new password controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function forgotPassword()
    {
        return view('backend.admin.auth.passwords.remind');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param PasswordRemindRequest $request
     * @return RedirectResponse
     */
    public function sendPasswordReminder(PasswordRemindRequest $request)
    {
        $user = Admin::where('email', $request->email)->first();

        $token = Password::broker('admins')->getRepository()->create($user);

        $user->notify(new ResetPasswordAdmin($token));

        return redirect()->route('admin.password.remind')->with('success', trans('frontend.password_reset_email_sent'));
    }

    /**
     * Display the password reset view for the given token.
     *
     * @param null $token
     * @return \Illuminate\Contracts\View\View
     */
    public function getReset($token = null)
    {
        if (is_null($token)) {
            throw new NotFoundHttpException;
        }

        return view('backend.admin.auth.passwords.reset')->with('token', $token);
    }

    /**
     * Reset the given user's password.
     *
     * @param PasswordResetRequest $request
     * @return \Illuminate\Http\Response|RedirectResponse
     */
    public function postReset(PasswordResetRequest $request)
    {
        $credentials = $request->only('email', 'password', 'password_confirmation', 'token');

        $response = Password::broker('admins')->reset($credentials, function ($user, $password) {
            $this->resetPassword($user, $password);
        });

        switch ($response) {
            case Password::PASSWORD_RESET:
                return redirect()->route('admin.login')->with('success', trans($response));

            default:
                return redirect()->back()->withInput($request->only('email'))->withErrors(['email' => trans($response)]);
        }
    }

    /**
     * Reset the given user's password.
     *
     * @param  CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $user->password = $password;
        $user->save();
    }
}
