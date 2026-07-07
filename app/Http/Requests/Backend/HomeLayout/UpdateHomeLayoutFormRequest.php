<?php

namespace App\Http\Requests\Backend\HomeLayout;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateHomeLayoutFormRequest extends FormRequest
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
      'home_title_ar' => 'required|string',
      'home_title_en' => 'required|string',
      'home_slider_text1_ar' => 'required|string',
      'home_slider_text1_en' => 'required|string',

      'home_slider_text2_ar' => 'required|string',
      'home_slider_text2_en' => 'required|string',
      'home_slider_text3_ar' => 'required|string',
      'home_slider_text3_en' => 'required|string',
      'home_slide_image' => 'mimes:g3,gif,ief,jpeg,jpg,jpe,ktx,png,btif,sgi,svg,svgz,tiff,tif,webp|max:4048',  // Size => 4 MB',
    ];
  }

  public function messages()
  {
    return [
      'home_title_ar.required' => 'Slider Title AR is required !!!',
      'home_title_en.required' => 'Slider Title EN is required !!!',
      'home_slider_text1_ar.required' => 'Slider Text One AR is required !!!',
      'home_slider_text1_en.requird' => 'Slider Text One EN is required !!!',
      'home_slider_text2_ar.required' => 'Slider Text Two AR is required !!!',
      'home_slider_text2_en.required' => 'Slider Text Two EN is required !!!',

      'home_slider_text3_ar.required' => 'Service Text Three AR is required !!!',
      'home_slider_text3_en.required' => 'Service Text Three EN is required !!!',

      'home_slide_image.mimes' => ' Slider Image must be image',
      'home_slide_image.max' => 'Slider Image must be less than 4 MB'

    ];
  }
}
