<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class JobApplicationCreateRequest extends FormRequest
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
            'full_name' => 'required|min:6',
            'email' => 'required|email|min:6',
            'cv' => 'required|file|max:20000|mimes:doc,pdf,docx',
            'job_id' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'cv.mimes' => 'يجب ان تكون السيرة الذاتية ملف pdf او docx',
        ];
    }
}
