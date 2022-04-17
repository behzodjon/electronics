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
        $storages = $this->storages->groupBy('id');
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category_id' => $this->category_id,
            'prices' => $this->getPrices($storages)
        ];
    }

    public function getPrices($storages)
    {
        $prices = [];
        foreach ($storages as $key => $value) {
            $prices[] = [
                'storage_id' => $key,
                'values' => $value->map(function ($item) use ($key) {
                    return [$item->pivot->condition_id => $item->pivot->price];
                })
            ];
        }

        return $prices;
    }
}
