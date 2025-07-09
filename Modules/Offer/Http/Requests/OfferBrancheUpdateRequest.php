<?php

namespace Modules\Offer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferBrancheUpdateRequest extends FormRequest
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
            'en.desc_offer' => 'required',
            'ar.desc_offer' => 'required',
            'en.slug' => 'required',
            'ar.slug' => 'required',
            'en.currency' => 'required',
            'ar.currency' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

}
