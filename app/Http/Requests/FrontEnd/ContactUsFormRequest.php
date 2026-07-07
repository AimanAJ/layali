<?php

namespace App\Http\Requests\FrontEnd;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsFormRequest extends FormRequest
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
        'name'=>'required',
        'email'=>'required|email',
        'message'=>'required',
        'subject'=>'required',
        
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Name is required !!!',

            'email.required' => 'Email is required !!!',

            'message.required' => 'message is required !!!',
            'subject.required' => 'subject is required !!!',
            
        
        ];
    }
}
