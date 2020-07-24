<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeCountRequest extends FormRequest
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
            'name' => 'required',
            'password' => 'required',
        ];
    }
    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '账户必填',
            'password.required'  => '密码必填',
        ];
    }
}
