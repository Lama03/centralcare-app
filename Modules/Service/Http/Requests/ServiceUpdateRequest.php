<?php

namespace Modules\Service\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceUpdateRequest extends FormRequest
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
            'en.name' => 'required',
            'ar.name' => 'required',
            'en.description' => 'required',
            'ar.description' => 'required',
            'en.slug' => 'required',
            'ar.slug' => 'required',
            'icon' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

}
