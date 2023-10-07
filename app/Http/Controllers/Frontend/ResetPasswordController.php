<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\PasswordRemindRequest;
use App\Http\Requests\Frontend\PasswordResetRequest;
use App\Models\Student;
use App\Notifications\ResetPasswordStudent;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Http\Controllers\Controller;
use Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;
    protected $guard = 'student';
    protected $broker = 'students';

    /**
     * Create a new password controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest:student');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function forgotPassword()
    {
        return view('frontend.auth.password.remind');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param PasswordRemindRequest $request
     * @return RedirectResponse
     */
    public function sendPasswordReminder(PasswordRemindRequest $request)
    {
        $user = Student::where('email', $request->email)->first();

        $token = Password::broker('student')->getRepository()->create($user);

        $user->notify(new ResetPasswordStudent($token));

        return redirect()->route('student.password.remind')->with('success', trans('frontend.password_reset_email_sent'));
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

        return view('frontend.auth.password.reset')->with('token', $token);
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

        $response = Password::broker('student')->reset($credentials, function ($user, $password) {
            $this->resetPassword($user, $password);
        });

        switch ($response) {
            case Password::PASSWORD_RESET:
                return redirect('login')->with('success', trans($response));

            default:
                return redirect()->back()->withInput($request->only('email'))->withErrors(['email' => trans($response)]);
        }
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $user->password = $password;
        $user->save();
    }
}
