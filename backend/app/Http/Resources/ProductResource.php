<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'model' => $this->title,
            'oldPrice' => $this->price ?? 0,
            'newPrice' => $this->price * 0.9 ?? 0,
            'brand' => new CategoryResource($this->whenLoaded('category')),
        ];
    }
}
