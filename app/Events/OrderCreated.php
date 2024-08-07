<?php

namespace App\Events;

use App\Repositories\OrderRepository;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    private int $orderId;
    private int $branchId;

    public function __construct(int $orderId,int $branchId)
    {
        $this->orderId=$orderId;
        $this->branchId=$branchId;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('create-order-'.$this->branchId),
        ];
    }

    public function broadcastWith():array
    {
        $repository=new OrderRepository();
        $order=$repository->getOrderById($this->orderId);
        $orderArray=$order->toArray(request());
        return [
            'statusName' => $orderArray['statusName'] ?? '',
            'user' => [
                'name' => $orderArray['user']['name'] ?? '',
                'phone' => $orderArray['user']['phone'] ?? '',
                'email' => $orderArray['user']['email'] ?? '',
            ],
            'products' => $orderArray['products'] ?? '',
            'total' => $orderArray['total'] ?? '',
            'orderDate' => $orderArray['orderDate'] ?? '',
        ];
    }
}
