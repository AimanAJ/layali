<?php

namespace App\Http\Requests\Backend\Slider;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreSliderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_ar' => 'required',
            'name_en' => 'required',
            'image' => 'required|mimes:g3,gif,ief,jpeg,jpg,jpe,ktx,png,btif,sgi,svg,svgz,tiff,tif,webp|max:4048',  // Size => 4 MB',
            'status'=>'required|integer'
        ];
    }
    public function message(){
        return[
            'name_ar.required'=>'Title AR is Required!',
            'name_en.required'=>'Title EN is Required!',
            'image.required'=>'Image is Required!',
            'image.mimes' =>' Image file is not valid',
            'image.max' =>' Image file size is not valid',
            'status.required'=>'Status is required',
            'status.integer'=>'Staus value is not valid'
        ];
    }
}
