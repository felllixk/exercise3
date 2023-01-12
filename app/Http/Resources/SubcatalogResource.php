<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubcatalogResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            =>  $this->id,
            'name'          =>  $this->name,
            'slug'          =>  $this->slug,
            'catalog_id'    =>  $this->catalog_id,
            'categories'    =>  $this->categories
        ];
    }
}
