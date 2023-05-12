<?php

namespace App\Http\Requests\UserAdmin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFromRequest extends FormRequest
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
            'name' => 'required|unique:user,name,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'tên đăng nhập không được bỏ trống',
            'name.unique' => 'tên đăng nhập đã tồn tại',
        ];
    }
}
