<?php

namespace App\Http\Requests\FrontEnd;

use Illuminate\Foundation\Http\FormRequest;

class formLoginRequestFormRequest extends FormRequest
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
        'email'=>'required|email',
        'password' => 'required|min:8',
        ];
    }


    public function messages()
    {
        return [
            'email.required' => 'البريد الالكتروني مطلوب !!!',
            'password.required' => 'كلمة المرور مطلوبة !!',
            'password.min' => 'يجب أن تكون كلمة المرور أكثر من 8 أحرف !!',

        ];
    }
}
