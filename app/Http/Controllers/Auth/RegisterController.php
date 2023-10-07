<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use Illuminate\Http\Request;
use App\Models\User;
use AppHelper;
use Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Session;

class RegisterController extends Controller
{
  public function register()
  {

    return view('auth.register');
  }

  public function storeUser(Request $request)
  {
      $rand = rand(10000,99999);


      $request->validate([
            'first_name' => 'required|string|min:3|max:255',
            'middle_name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',
            'phoneNumber' => 'required|numeric|min:9|unique:users',
            'gender' => 'required|string|max:6',
            'birthday' => 'required|date',
            'email' => 'required|string|email|min:5|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'terms' =>'required|accepted'
      ]);

      if(AppHelper::getAge($request->birthday) < 18){
                              return back()->withInput()->with('error', "يجب ان يكون السن اكبر من 18 سنة لتتمكن من التسجيل");

      }else{
          $token = Str::random(60);

          User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'phoneNumber' => $request->phoneNumber,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'is_verify' => 0 ,
            'verification_code' => $rand ,
            'token' => $token,
            'password' => $request->password,
      ]);
        /*
          $objDemo = new \stdClass();
          $objDemo->urlVerfiy = url('verify/' . $token);
          $objDemo->username = $request->first_name . ' ' . $request->last_name;

          Mail::to($request->email)->send(new DemoEmail($objDemo));
          
        return redirect('login')->with('success', "تم التسجيل بنجاح ، تم ارسال رسالة لتفعيل حسابك بالبريد الالكتروني");
    */
        $msg ="كود التفعيل لحسابك : ".$rand;
        AppHelper::sendSMS($request->phoneNumber,$msg);

        return redirect('activate')->with('success', "تم التسجيل بنجاح ، تم ارسال كود تفعيل حسابك عن طريق الجوال");


      }
   }


   public function verifyEmail($token){
      User::where('token',$token)->update([
          'status' => 1
          ]);
       return redirect('login')->with('success', "تم تفعيل حسابك ، برجاء تسجيل الدخول");

   }

}
