<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexProductsRequest extends FormRequest
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
            'slug'                      =>  ['nullable', 'string', 'max:45'],
            'amount'                    =>  ['nullable', 'array'],
            'amount.max'                =>  ['nullable', 'integer', 'min:0', 'max:1000000000'],
            'amount.min'                =>  ['nullable', 'integer', 'min:0', 'max:1000000000'],
            'catalog_id'                =>  ['nullable', 'integer'],
            'subcatalog_id'             =>  ['nullable', 'integer'],
            'category_id'               =>  ['nullable', 'integer'],
            'page'                      =>  ['nullable', 'integer'],
            'per_page'                  =>  ['nullable', 'integer'],
            'characteristics'           =>  ['nullable', 'array'],
            'characteristics.*.name'    =>  ['max:45'],
            'characteristics.*.value'   =>  ['max:45']
        ];
    }
}
