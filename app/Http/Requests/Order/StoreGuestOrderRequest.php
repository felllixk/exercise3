<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuestOrderRequest extends FormRequest
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
            'email'                 =>  ['required', 'email'],
            'name'                  =>  ['required', 'string', 'min:1', 'max:255'],
            'baskets'               =>  ['required', 'array', 'min:1'],
            'baskets.*.product_id'  =>  ['required', 'integer', 'exists:products,id'],
            'baskets.*.count'       =>  ['required', 'integer',]
        ];
    }
}
