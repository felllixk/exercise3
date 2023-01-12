<?php

namespace App\Http\Requests\Characteristic;

use Illuminate\Foundation\Http\FormRequest;

class StoreCharacteristicRequest extends FormRequest
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
            'name'          =>  ['required', 'min:1', 'max:40'],
            'value'         =>  ['required', 'min:1', 'max:40'],
            'product_id'    =>  ['required', 'exists:products,id']
        ];
    }
}
