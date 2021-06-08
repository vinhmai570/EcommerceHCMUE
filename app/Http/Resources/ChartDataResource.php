<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChartDataResource extends JsonResource
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
            'period'    => $request -> order_date,
            'order'     => $request -> total_order,
            'sales'     => $request -> total_price,
            'profit'    => $request -> total_price * 15/100,
            'quantity'  => $request -> quantity
        ];
    }
}
