<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if($this->resource->is_discount===1){
            $linetotal= $this->resource->quantity* $this->resource->discount_price;
        }
        else{
            $linetotal= $this->resource->quantity* $this->resource->price;
        }

        return [
            "name"=>$this->resource->name,
            "description"=>$this->resource->description,
            "price"=>$this->resource->price,
            "dprice"=>$this->resource->discount_price,
            "is_d"=>$this->resource->is_discount,
            "quantity"=>$this->resource->quantity,
            "lineTotal"=>$linetotal
        ];
    }
}
