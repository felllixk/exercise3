<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'          =>  ['required', 'string', 'min:2', "max:45"],
            'description'   =>  ['required', 'string', 'min:5', 'max:1000'],
            'amount'        =>  ['required', 'integer', 'min:0', 'max:1000000000'],
            'catalog_id'    =>  ['required', 'integer', 'exists:catalogs,id'],
            'subcatalog_id' =>  ['required', 'integer', 'exists:subcatalogs,id'],
            'category_id'   =>  ['integer', 'exists:categories,id']
        ];
    }
}
