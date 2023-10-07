<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Hash;
use Auth;
use AppHelper;

class UserController extends Controller {
    public function profile() {

        $user = auth( 'user' )->user();
        return view( 'frontend.user.profile', compact( 'user' ) );
    }

    public function changePassword() {

        return view( 'frontend.user.changePassword' );
    }

    public function updatePassword( Request $request ) {
        $request->validate( [
            'old_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',

        ] );
        $user = auth( 'user' )->user();

        if ( Hash::check( $request->old_password, $user->password ) ) {

            $user = User::where( 'id', auth( 'user' )->user()->id )
            ->update( ['password' => Hash::make( $request->password )] );

            return back()->with( 'success', 'تم تغيير كلمة المرور بنجاح' );
        } else {
            return back()->withInput()->with( 'error', 'كلمة المرور غير صحيحة' );
        }

    }

    public function updateProfile( Request $request ) {
        $user = auth( 'user' )->user();
        $request->validate( [
            'first_name' => 'required|min:3|string|max:255',
            'middle_name' => 'required|min:3|string|max:255',
            'last_name' => 'required|min:3|string|max:255',
            'phoneNumber' => 'required|min:9|numeric|unique:users,phoneNumber,'.$user->id.',id',
            'gender' => 'required|string|max:6',
            'birthday' => 'required|date',
            'email' => 'required|string|email|max:255|min:6|unique:users,email,'.$user->id.',id'
        ] );
          if(AppHelper::getAge($request->birthday) < 18){
                                  return back()->withInput()->with('error', "يجب ان يكون السن اكبر من 18 سنة");

          }else{

            $data['first_name'] = $request->first_name;
            $data['middle_name'] = $request->middle_name;
            $data['last_name'] = $request->last_name;
            $data['phoneNumber'] = $request->phoneNumber;
            $data['gender'] = $request->gender;
            $data['birthday'] = $request->birthday;
            $data['email'] = $request->email;
            $user = User::where( 'id', auth( 'user' )->user()->id )
            ->update( $data );

            return back()->with( 'success', 'تم تحديث الملف الشخصى بنجاح' );

        }
    }
}

