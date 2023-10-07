<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repository\StudentRepositoryInterface;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * @var StudentRepositoryInterface
     */
    private $studentRepository;

    /**
     * AuthController constructor.
     * @param StudentRepositoryInterface $studentRepository
     */
    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->middleware('guest', ['except' => ['getLogout']]);
        $this->middleware('auth:student', ['only' => ['getLogout']]);
        $this->studentRepository = $studentRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        if (\Auth::guard('student')->check()) {
            return redirect()->route('student.profile.index');
        }
        return view('frontend.auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        // Attempt to log the user in
        if (\Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('student.profile.index'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(trans('auth.failed'));
    }

    /**
     * Log the user out of the application.
     *
     * @return RedirectResponse
     */
    public function logout()
    {
        \Auth::guard('student')->logout();
        return redirect()->intended(route('student.login.index'));
    }
}
