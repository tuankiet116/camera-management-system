<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAuthRequest extends FormRequest
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
            'email' => 'email:rfc,dns|required',
            'password' => 'min:8|required'
        ];
    }

    public function attributes()
    {
        return [
            'email' => __('auth.email'),
            'password' => __('auth.password')
        ];
    }

    public function messages()
    {
        return [
            'email.*' => __('auth.email_require'),
            'password.*' => __('auth.password_require')
        ];
    }
}
