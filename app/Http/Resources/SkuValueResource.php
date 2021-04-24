<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SkuValueResource extends JsonResource
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
            'attribute_id'       => $this->attribute_id,
            'attribute_value_id' => $this->attribute_value_id,
            'attribute'          => $this->attribute->name,
            'attribute_value'    => $this->attribute_value->value_name,
        ];
    }
}
