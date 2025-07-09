<?php

namespace Modules\Specificity\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecificityUpdateRequest extends FormRequest
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
            'en.name' => ['required', 'max:255'],
            'ar.name' => ['required', 'max:255'],
            'en.slug' => ['required', 'max:255'],
            'ar.slug' => ['required', 'different:en.slug', 'max:255'],
            'en.description' => 'required',
            'ar.description' => 'required',
            'service_id' => 'required|numeric|min:1',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
