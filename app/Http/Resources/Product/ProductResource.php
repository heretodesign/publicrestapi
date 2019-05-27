<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        'seller_name' => $this->seller_name,
        'weight' => $this->weight,
        'country_of_origin' => $this->country_of_origin,
        'harvesting_date' => $this->harvesting_date,
        'cultivar' => $this->cultivar,
    }
}
