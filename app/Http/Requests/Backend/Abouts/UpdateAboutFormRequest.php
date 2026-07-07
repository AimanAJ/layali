<?php

namespace App\Http\Requests\Backend\Abouts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateAboutFormRequest extends FormRequest
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
            'about_us_title_ar' => 'required',
            'about_us_title_en' => 'required',
            'about_us_description_ar' => 'required',
            'about_us_description_en' => 'required',
            'about_us_description_sub_ar' => 'required',
            'about_us_description_sub_en' => 'required',
            'about_us_image' => 'mimes:g3,gif,ief,jpeg,jpg,jpe,ktx,png,btif,sgi,svg,svgz,tiff,tif,webp|max:4048'  // Size => 4 MB',
        ];
    }

    public function messages()
    {
        return [
            'about_us_title_ar.required' => 'About Us Title AR is required !!!',

            'about_us_title_en.required' => 'About Us Title EN is required !!!',

            'about_us_description_ar.required' => 'About Us Description AR is required !!',

            'about_us_description_en.required' => 'About US Description EN is required !!',

            'about_us_description_sub_ar.required' => 'About Us Description Sub AR is required !!',

            'about_us_description_sub_en.required' => 'About US Description Sub EN is required !!',

            'about_us_image.mimes' => 'Image must be image',

            'about_us_image.max' => 'Image must be less than 4 MB'


        ];
    }
}
