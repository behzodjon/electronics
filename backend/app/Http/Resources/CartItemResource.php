<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartItemResource extends JsonResource
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
            'id' => $this->id,
            'product' => $this->product->title,
            'category' => $this->category->title,
            'storage' => $this->storage->title,
            'condition' => $this->condition->title,
            'price' => $this->price,
        ];
    }
}
