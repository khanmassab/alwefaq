<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/27/20, 7:25 PM
 * Last Modified: 9/18/19, 12:21 PM
 * Project Name: Wafaq
 * File Name: PasswordRemindRequest.php
 */

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRemindRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|exists:admins,email',
        ];
    }
}
