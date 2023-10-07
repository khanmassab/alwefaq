<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Mail;
use AppHelper;
use App\Models\User;
use Hash;

class ForgotPasswordController extends Controller
{
    public function getEmail()
    {

       return view('auth.password.email');
    }

    public function postEmail(Request $request)
    {
        $request->validate([
            'phoneNumber' => 'required|required|numeric|min:9',
        ]);

        $token = Str::random(60);

        $rand = rand(10000000,99999999);
                
        
        DB::table('password_resets')->insert(
            ['phoneNumber' => $request->phoneNumber, 'token' => $token, 'created_at' => Carbon::now()]
        );
        
        //$url = url('/reset-password/'.$token);
        
         $user = User::where('phoneNumber', $request->phoneNumber)
                      ->update(['password' => Hash::make($rand)]);
                      
        $msg ="كلمة المرور الجديدة هى   : ".$rand;
        
        AppHelper::sendSMS($request->phoneNumber,$msg);
        

        
        /*
        Mail::send('auth.password.verify',['token' => $token], function($message) use ($request) {
                  $message->from($request->email);
                  $message->to($request->email);
                  $message->subject('استعادة كلمة المرور');
               });
        */
        return back()->with('success', ' لتغيير كلمة المرور الجديدة لجوالك');
    }
}
