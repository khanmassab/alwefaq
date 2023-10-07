<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|min:3|max:255',
            'middle_name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',
            'phoneNumber' => 'required|numeric|min:9|unique:users,phoneNumber,'. request('id') .',id',
            'gender' => 'required|string|max:6',
            'birthday' => 'required|date',
            'email' => 'required|string|email|min:5|max:255|unique:users,email,'. request('id') . ',id',
            'password' => 'nullable|string|min:8',
        ];
    }
}
