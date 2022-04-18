<?php

namespace App\Http\Resources;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
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
            'image_url' => $this->image ? URL::to($this->image) : null,
            'category_id' => $this->category_id,
            'prices' => $this->getPrices($storages)
        ];
    }

    public function getPrices($storages)
    {
        $prices = [];
        
        foreach ($storages as $key => $value) {
            $prices[] = [
                'id' => Str::uuid(),
                'storage_id' => $key,
                'values' => $value->map(function ($item) use ($key) {
                    return  $item->pivot->price;
                })
            ];
        }

        return $prices;
    }
}
