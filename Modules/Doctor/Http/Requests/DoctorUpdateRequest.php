<?php

namespace Modules\Doctor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorUpdateRequest extends FormRequest
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
            'en.bio' => 'required',
            'ar.bio' => 'required',
            'years_of_experience' => 'required',
            #'start_time' => 'required',
            #'end_time' => 'required',
            'specialty_id' => 'required|numeric|min:1',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

}
