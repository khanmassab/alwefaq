<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/27/20, 7:25 PM
 * Last Modified: 9/18/19, 12:21 PM
 * Project Name: Wafaq
 * File Name: PasswordResetRequest.php
 */

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email|exists:students,email',
            'password' => 'required|confirmed|min:6'
        ];
    }
}
