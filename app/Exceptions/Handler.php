<?php
/**
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 1/4/20, 4:52 PM
 * Project Name: Wafaq
 * File Name: Handler.php
 */

namespace App\Exceptions;

use App\Support\ApiHelper;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param \Exception $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable  $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {

        if ($request->expectsJson() || $request->route()->getPrefix() == 'api') {
            return response()->json(['errors' => ['Unauthenticated.']], 401);
        }

        $guard = $exception->guards()[0] ?? null;

        switch ($guard) {
            case 'admin':
                $login = 'admin.login';
                break;
            case 'student':
                $login = 'student.login.index';
                break;
            default:
                $login = 'login';
                break;
        }
        return redirect()->guest(route($login));
    }
}
