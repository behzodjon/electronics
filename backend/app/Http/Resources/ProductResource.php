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
        $oldPrice = $this->pivot ? $this->pivot->price : null;
        $newPrice = $oldPrice ? $oldPrice + ($oldPrice * 10 / 100) : null;

        return [
            'id' => $this->id,
            'model' => $this->title,
            'image' => url("/storage/images/{$this->image}"),
            'oldPrice' => $oldPrice,
            'newPrice' => $newPrice,
            'brand' => new CategoryResource($this->whenLoaded('category')),
        ];
    }
}
