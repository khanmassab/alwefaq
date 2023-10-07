<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class MarriageRequestCreateRequest extends FormRequest
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
            'first_name'=>'nullable|min:3',
            'middle_name'=>'nullable|min:3',
            'last_name'=>'nullable|min:3',
            'note'=>'nullable|min:4',
            'nationality_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'birthday' => 'date|before:-17 years',
            'birthday_type' => 'string',
            'shape' => 'required|string',
            'weight' => 'required|string',
            'height' => 'required|string',
            'skin_color' => 'required|string',
            'health_status' => 'required|string',
            'disease' => 'nullable|string',
            'social_status' => 'required|string',
            'financial_status' => 'required|string',
            'job_title' => 'required|string|min:4',
            'job_in' => 'required|string|min:3',
            'job_type' => 'required|string',
            'monthly_income' => 'required|string',
            'request_type' => 'required|numeric',
        ];
    }
}
