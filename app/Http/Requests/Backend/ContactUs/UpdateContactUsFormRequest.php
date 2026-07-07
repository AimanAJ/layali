<?php

namespace App\Http\Requests\Backend\ContactUs;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateContactUsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required',
            'phone' => 'required',
            'map_url' => 'required',
            'address_ar' => 'required',
            'address_en' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'email is required !!!',
            'phone.required' => 'phone is required !!!',
            'map_url.required' => 'map_url is required !!!',
            'address_ar.required' => 'Address AR Link is required !!!',
            'address_en.required' => 'Address EN Link is required !!!',


        ];
    }
}
