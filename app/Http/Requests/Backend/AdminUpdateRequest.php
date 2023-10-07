<?php

namespace App\Http\Requests\Backend;

use App\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
            'name' => 'required',
            'email' => "required|email|unique:admins,email,{$this->route()->admin}",
            'password' => 'nullable|min:6|confirmed',
            'role' => 'required'
        ];
    }
}
