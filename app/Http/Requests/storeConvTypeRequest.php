<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeConvTypeRequest extends FormRequest
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
            'id' => 'required',
            'name' => 'required',
        ];
    }
    /**
     * @return array
     */
    public function messages()
    {
        return [
            'id.required' => 'id必填',
            'name.required' => '名称必填',
        ];
    }
}
