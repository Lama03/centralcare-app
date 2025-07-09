<?php

namespace Modules\Device\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceStoreRequest extends FormRequest
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
            'en.name' => 'required',
            'en.description' => 'required',
            'en.features' => 'required',
            'ar.name' => 'required',
            'ar.description' => 'required',
            'ar.features' => 'required',
        ];
    }

}
