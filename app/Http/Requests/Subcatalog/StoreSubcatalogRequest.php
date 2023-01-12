<?php

namespace App\Http\Requests\Subcatalog;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubcatalogRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', "max:50"],
            'catalog_id' => ['required', 'integer', 'exists:catalogs,id']
        ];
    }
}
