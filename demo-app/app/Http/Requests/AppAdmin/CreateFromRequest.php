<?php

namespace App\Http\Requests\AppAdmin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\App;

class CreateFromRequest extends FormRequest
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
            'name' => 'required|unique:app,name',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'tên app không được bỏ trống',
            'name.unique' => 'tên app đã tồn tại',
            'image.required' => 'ảnh logo không được bỏ trống ',
            'image.image' => 'bạn cần chọn ảnh',
            'image.mimes' => 'ảnh phải có đuôi jpg,png,jpeg,gif,svm'
        ];
    }
}
