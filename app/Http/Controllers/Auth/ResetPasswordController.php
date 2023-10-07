<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Hash;

class ResetPasswordController extends Controller
{
    public function getPassword($token) {

       return view('auth.password.reset', ['token' => $token]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',

        ]);

        $updatePassword = DB::table('password_resets')
                            ->where(['token' => $request->token])
                            ->first();

        if(!$updatePassword)
            return back()->withInput()->with('error', 'خطأ فى الرابط');

          $user = User::where('phoneNumber', $updatePassword->phoneNumber)
                      ->update(['password' => Hash::make($request->password)]);

          DB::table('password_resets')->where(['token'=> $request->token])->delete();

          return redirect('/login')->with('success', 'تم تغيير كلمة المرور!');

    }
}
