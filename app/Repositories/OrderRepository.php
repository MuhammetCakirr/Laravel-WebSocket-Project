<?php

namespace App\Repositories;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderItems;
use App\Models\OrderUser;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Collection;

class OrderRepository
{
    public function orderCreate(int $branchId,int $statusId ,int $customerId  , float $subtotal, float $tax ,float $total)
    {
        return Order::query()->create(
            [
                "branch_id"=>$branchId,
                "status_id"=>$statusId,
                "customer_id"=>$customerId,
                "subtotal"=>$subtotal,
                "tax"=>$tax,
                "total_amount"=>$total,
            ]
        );
    }

    public function orderAddressCreate(int $orderId,string $country,string $city,string $state,string $line1,string $line2)
    {
        OrderAddress::query()->create([
            "order_id"=>$orderId,
            "country"=>$country,
            "city"=>$city,
            "state"=>$state,
            "line_1"=>$line1,
            "line_2"=>$line2,
        ]);
    }

    public function orderItemsCreate(int $orderId,int $productId,int $quantity, string $name,string $desc,float $price,float $discount_price,int $is_discount)
    {

        OrderItems::query()->create([
            "order_id"=>$orderId,
            "product_id"=>$productId,
            "quantity"=>$quantity,
            "name"=>$name,
            "description"=>$desc,
            "price"=>$price,
            "discount_price"=>$discount_price,
            "is_discount"=>$is_discount,
        ]);
    }

    public function orderUserCreate(int $orderId,string $name,string $email,string $phone)
    {
        OrderUser::query()->create([
            "order_id"=>$orderId,
            "name"=>$name,
            "phone"=>$phone,
            "email"=>$email,
        ]);
    }

    public function getAllOrders(int $branchId):AnonymousResourceCollection
    {
        $orders= Order::query()->where('branch_id', $branchId)->with(["status","orderAddress","orderItems","orderUser","branch"])
                      -> orderBy('created_at',"desc")->get();
        return OrderResource::collection($orders);
    }
    public function getOrderById(int $id):OrderResource
    {
        $order= Order::query()->where('id',$id)->with(["status","orderAddress","orderItems","orderUser","branch"])
            ->first();
        return new OrderResource($order);
    }
}
