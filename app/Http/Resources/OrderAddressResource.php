<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderAddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "country"=>$this->resource->country,
            "city"=>$this->resource->city,
            "state"=>$this->resource->state,
            "line_1"=>$this->resource->line_1,
            "line_2"=>$this->resource->line_2?? ""
        ];
    }
}
