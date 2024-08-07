<?php

namespace App\Services;

use App\Events\OrderCreated;
use App\Models\Product;
use App\Models\Status;
use App\Repositories\OrderRepository;
use \Illuminate\Support\Collection;
use App\Models\Branche;

class OrderService
{
    public function index(Collection $datas):string
    {
        $nearBranchId = $this->whichBranchIsNear($datas->get('latitude'), $datas->get('longitude'));

        $total = $this->getTotalPrice($datas->get('products'));

        $tax = ($total * 20) / 100;

        $subtotal=$total - $tax;

        $repository =new OrderRepository();

        $order=$repository->orderCreate($nearBranchId,1,$datas->get('userId'),$subtotal,$total,$tax);

        $repository->orderAddressCreate($order->id,$datas->get('country'),
                                        $datas->get('city'),$datas->get('state'),
                                        $datas->get('line1'),$datas->get('line2'));

        $repository->orderUserCreate($order->id,$datas->get('userName'),$datas->get('userEmail'),$datas->get('userPhone'));

        foreach ($datas->get('products') as $id => $quantity) {
            $product = Product::query()->find($id);

            $repository->orderItemsCreate($order->id,$product->id,$quantity, $product->name,
                                          $product->description,$product->price,$product->discount_price,
                                          $product->is_discount);
        }

        event(new OrderCreated($order->id,$nearBranchId));

        return "Order has been successfuly created." ;


    }

    private function getTotalPrice(array $products):float
    {
        $total = 0;
        foreach ($products as $id => $quantity) {
            $product = Product::query()->find($id);

            if ($product->discount_price != 0.00 && $product->is_discount === 1) {
                $total = ($total + $product->discount_price) * $quantity;
            } else {
                $total = ($total + $product->price) * $quantity;
            }
        }
        return $total;
    }

    private function whichBranchIsNear($latitude, $longitude):int
    {
        $branche = Branche::query()->selectRaw("branches.id, branches.name, locations.latitude, locations.longitude,
        ( 6371 * acos( cos( radians(?) ) *
        cos( radians( locations.latitude ) ) *
        cos( radians( locations.longitude ) - radians(?) ) +
        sin( radians(?) ) *
        sin( radians( locations.latitude ) ) ) ) AS distance",
            [$latitude, $longitude, $latitude])
            ->join('locations', 'branches.location_id', '=', 'locations.id')
            ->orderBy('distance')
            ->first();

        return $branche->id;
    }
}
