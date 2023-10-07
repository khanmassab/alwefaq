<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class HelpRequestCreateRequest extends FormRequest
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
            'full_name' => 'required|min:3',
            'phoneNumber' => 'required|min:10',
            'email' => 'required|email',
            'address' => 'required',
            'type' => 'required',
            'value_request' => 'required_if:type,price|numeric|min:1|max:9999999',
            'items' => 'required_if:type,item'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
          'value_request.min' => 'يجب ان يكون المبلغ أكبر من 0',
          'full_name.min' => 'يجب ان يكون الاسم أكثر من 3 حروف',
          'phoneNumber.min' => 'يجب ان يكون رقم الجوال 10 ارقام او أكثر',
          'value_request.max' => 'لقد تخطيت المبلغ المسموح',
          'items.required_if' => 'يجب تحديد المنتج المطلوب',
          'value_request.required_if' => 'يجب تحديد المبلغ المطلوب',

        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'phoneNumber' => 'رقم الجوال',
            'full_name' => 'الاسم الثلاثي',
        ];
    }
}
