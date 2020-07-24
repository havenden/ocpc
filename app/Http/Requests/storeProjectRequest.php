<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeProjectRequest extends FormRequest
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
            'conv_type_id' => 'required',
        ];
    }
    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '名称必填',
            'conv_type_id.required'  => '类型必填',
        ];
    }
}
