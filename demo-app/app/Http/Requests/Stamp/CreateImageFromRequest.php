<?php

namespace App\Http\Requests\Stamp;

use Illuminate\Foundation\Http\FormRequest;

class CreateImageFromRequest extends FormRequest
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
            'image.*.current_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'image.*.image_change' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'image' => 'required|array',
            'image.*' => 'required',
        ];
    }


}
