<?php

namespace App\Http\Requests\Basket;

use Illuminate\Foundation\Http\FormRequest;

class EditBasketRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge(['product_id' => $this->route('product_id')]);
    }

    public function rules()
    {
        return [
            'product_id'    => ['required', 'exists:products,id'],
            'count'         => ['integer', 'min:1', "max:1000000000"]
        ];
    }
}
