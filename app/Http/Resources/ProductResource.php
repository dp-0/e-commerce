<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this['name'],
            'price' => $this['price'],
            'status' => $this['status'],
            'photo' => asset($this['photo']),
            'offerTitle' => isset($this['offer']['title'])?$this['offer']['title']:NULL,
            'offerPercentage' => isset($this['offer']['percentage'])?$this['offer']['percentage']:NULL,
            'product_url'=> null,
            'cart_url' => route('add.to.cart',$this['id'])
        ];
    }
}
