<?php

namespace App\Http\Resources\Tree;

use Illuminate\Http\Resources\Json\JsonResource;

class TreeCatalogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'slug'          => $this->slug,
            'subcatalogs'   => TreeSubcatalogResource::collection($this->subcatalogs)
        ];
    }
}
