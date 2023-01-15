<?php

namespace App\Http\Requests\Basket;

use Illuminate\Foundation\Http\FormRequest;

class StoreManyBasketRequest extends FormRequest
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
            'baskets'               =>    ['required', 'array'],
            'baskets.*'             =>    ['required', 'array'],
            'baskets.*.product_id'  =>    ['required', 'exists:products,id', 'distinct:strict'],
            'baskets.*.count'       =>    ['integer', 'min:1', "max:1000000000"]
        ];
    }
}
