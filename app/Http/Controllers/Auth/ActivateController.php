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

class ActivateController extends Controller
{
  public function activate()
  {

    return view('auth.activate');
  }

   public function activateAccount(Request $request){
          $request->validate([
            'code' => 'required|numeric'
      ]);
      
   
      $query = User::where('verification_code',$request->code)->update([
          'status' => 1
          ]);
        if ($query) {
           return redirect('login')->with('success', "تم تفعيل حسابك ، برجاء تسجيل الدخول");
        }else
        {
            
           return redirect('activate')->with('error', "الكود المدخل غير صحيح");
            
        }
          

   }

}
