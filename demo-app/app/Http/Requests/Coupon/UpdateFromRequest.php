<?php

namespace App\Http\Requests\Coupon;

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
            'name' => 'required',
            'introduce' => 'required|min:1|max:255',
            'note' => 'required|min:1|max:255',
            'stamp_number' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'tên coupon không được bỏ trống',
            'introduce.required' => 'giới thiệu không được bỏ trống',
            'introduce.min' => 'quá ít ký tự',
            'introduce.max' => 'giới thiệu chỉ cho phép từ 1 đến 255 ký tự',
            'note.required' => 'chú thích không được bỏ trống',
            'note.min' => 'quá ít ký tự',
            'note.max' => 'chú thích chỉ cho phép từ 1 đến 255 ký tự',
            'stamp_number.required' => 'số tem không được bỏ trống',
        ];
    }
}
