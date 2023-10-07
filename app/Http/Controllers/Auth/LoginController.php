<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Session;
use AppHelper;

class LoginController extends Controller
{

//    use AuthenticatesUsers;
//    protected $redirectTo = '/';
//
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }

    public function login()
    {

      return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'phoneNumber' => 'required|required|numeric|min:9',
            'password' => 'required|string|min:8',
        ]);


        $credentials = $request->only('phoneNumber', 'password');
        $user = User::where('phoneNumber', $request->phoneNumber)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {

            return redirect('login')->with('error', 'رقم الهاتف او كلمة المرور خاطئة');
        }elseif ($user->status && \Auth::guard('user')->attempt($credentials, $request->remember)){

            return redirect()->intended('/');
        }else{
            $token = $user->token;
            /*
            return redirect('login')->with('error', 'برجاء تفعيل حسابك عن طريق البريد الالكتروني. <a href='. url('resendVerify/' . $token) .'>اعادة ارسال رابط التفعيل</a> ');
            */
            return redirect('login')->with('error', 'برجاء تفعيل حسابك عن طريق رقم الهاتتف. <a href='. url('resendVerify2/' . $user->id) .'>اعادة ارسال رابط التفعيل</a> ');
            
        }
    }

    public function logout() {
      Auth::logout();

      return redirect('/');
    }

    public function resendVerify($token){
        $newToken = Str::random(60);

        $userData = User::where('token',$token)->first();

        $userData->token = $newToken;

        $userData->save();

        $objDemo = new \stdClass();
        $objDemo->urlVerfiy = url('verify/' . $newToken);
        $objDemo->username = $userData->first_name . ' ' . $userData->last_name;

        Mail::to($userData->email)->send(new DemoEmail($objDemo));

        return redirect('login')->with('success', "تم ارسال رسالة تفعيل الحساب الى البريد الالكتروني الخاص بكم");;

    }
    
    public function resendVerify2($id){
        
          $rand = rand(10000,99999);
        
        $userData = User::where('id',$id)->first();

        $userData->verification_code = $rand;

        $userData->save();

        $msg ="كود التفعيل لحسابك : ".$rand;
        AppHelper::sendSMS($userData->phoneNumber,$msg);

        return redirect('activate')->with('success', "تم التسجيل بنجاح ، تم ارسال كود تفعيل حسابك عن طريق الجوال");
    }


}
