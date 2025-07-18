<?php

namespace Modules\Slider\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderStoreRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'ar.first_title' => ['required', 'string', 'max:255'],
            'en.first_title' => ['required', 'string', 'max:255'],
            'ar.second_title' => ['required', 'string', 'max:255'],
            'en.second_title' => ['required', 'string', 'max:255'],
            'ar.description' => ['required', 'string', 'max:255'],
            'en.description' => ['required', 'string', 'max:255'],
        ];
    }

}
