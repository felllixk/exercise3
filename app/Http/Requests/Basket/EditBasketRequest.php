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
        $this->merge(['id' => $this->route('id')]);
    }

    public function rules()
    {
        return [
            'id'    => ['required', 'exists:baskets,id'],
            'count'         => ['integer', 'min:1', "max:1000000000"]
        ];
    }
}
