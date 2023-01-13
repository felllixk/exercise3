<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IndexProductsResource extends JsonResource
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
            'name'          =>  $this->name,
            'slug'          =>  $this->slug,
            'description'   =>  $this->description,
            'amount'        =>  $this->amount,
            'user_id'       =>  $this->user_id,
            'catalog_id'    =>  $this->catalog_id,
            'subcatalog_id' =>  $this->subcatalog_id,
            'category_id'   =>  $this->category_id,
            'updated_at'    =>  $this->updated_at
        ];
    }
}
