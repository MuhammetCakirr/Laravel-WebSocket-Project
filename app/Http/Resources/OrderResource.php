<?php

namespace App\Http\Resources;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "tax"=>$this->resource->tax." $",
            "subtotal"=>$this->resource->subtotal." $",
            "total"=>$this->resource->total_amount." $",
            "orderDate" => Carbon::parse($this->resource->created_at)->format('l, F j, Y g:i A'),
            "address"=>new OrderAddressResource($this->whenLoaded('orderAddress')),
            "products"=>$this->whenLoaded('orderItems')->pluck('name')->implode(', '),
            "user"=>new OrderUserResource($this->whenLoaded('orderUser')),
            "branche"=>$this->resource->branch->name,
            "statusName"=>$this->resource->status->name,
        ];
    }
}
