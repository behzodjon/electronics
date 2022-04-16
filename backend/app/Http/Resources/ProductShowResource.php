<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $prices = $this->storages->groupBy('id');
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category_id' => $this->category_id,
            // 'prices' => ProductPricesResource::collection($prices)
            'prices' => [
                // 'storage_id'=>
            ]
        ];
    }
}
