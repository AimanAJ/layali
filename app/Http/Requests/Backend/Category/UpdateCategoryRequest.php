<?php

namespace App\Http\Requests\Backend\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class UpdateCategoryRequest extends FormRequest
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
            'name_en' => 'required',
            'name_ar' => 'required',
            'status' =>'required',
        ];
    }
    public function messages()
    {
        return[
            'name_en.required' => 'The English Name Is Required',
            'name_ar.required' => 'The English Name Is Required',
            'status.required' => 'The status Is Required',
        ];
        
    }
}
