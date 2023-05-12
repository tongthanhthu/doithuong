<?php

namespace App\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerFromRequest extends FormRequest
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
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:13'
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'bạn phải nhập số điện thoại',
            'phone.regex' => 'số điện thoại định dạng không đúng',
            'phone.min' => 'bạn cần nhập số điện thoại',
            'phone.max' => 'bạn cần nhập số điện thoại'
        ];
    }
}
