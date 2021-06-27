<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SkuValueResource;
use App\Models\Product;
class ProductSkuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'sku'        => $this->sku,
            'image'      => get_image($this->image, Product::IMAGE_SIZE['small']),
            'price'      => $this->price,
            'sale_price' => $this->sale_price,
            'quantity'   => $this->quantity,
            'is_default' => $this->is_default,
            'sku_values' => SkuValueResource::collection($this->sku_values)
        ];
    }
}
