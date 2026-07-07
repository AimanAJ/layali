<?php

namespace App\Http\Requests\Backend\Playlist;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlaylistRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
      
       
        return [
            'title_en' => 'required',
            'title_ar' => 'required',
            'description_en' =>'required',
            'description_ar' =>'required',
            'image'=>'required|mimes:g3,gif,ief,jpeg,jpg,jpe,ktx,png,btif,sgi,svg,svgz,tiff,tif,webp|max:4048', // Size => 4 MB'
            'playlist_type' =>'required|integer',
            'status' =>'required|integer',
           'categories_id'=> 'required'
        ];
      
    }
    public function messages()
    {
        return[
            'title_en.required' => 'Title EN Is Required',
            'title_ar.required' => 'Title AR Is Required',
            'description_en.required' => 'The Description EN Is Required',
            'description_ar.required' => 'The Description AR Is Required',
            'image.required' => 'Image Is Required',
            'image.mimes' => 'The Image must be a file of type: g3, gif, ief, jpeg, jpg, jpe, ktx, png, btif, sgi, svg, svgz, tiff, tif, webp.',
            'image.max' => 'The Image may not be greater than 4048 kilobytes.',   
            'playlist_type.integer' => 'Playlist Type must be an integer',
            'playlist_type.required' => 'Playlist Type is required',  
            'status.integer' => 'Status must be an integer',
            'status.required' => 'Status is required',
            'categories_id.required' => 'Categories is required',

        ];
    }
}
