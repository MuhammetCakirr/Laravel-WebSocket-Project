<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Repositories\OrderRepository;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{

    public function index(CreateOrderRequest $request)
    {

      $user = Auth::user();

      $validatedData=collect($request->validated());

      $validatedData->put('userId', $user->id);
      $validatedData->put('userName', $user->name);
      $validatedData->put('userPhone', $user->phone);
      $validatedData->put('userEmail', $user->email);

      $service=new OrderService();
      return $service->index($validatedData);

    }
    public function indexPage(){
        $repository=new OrderRepository();
        $orders=$repository->getAllOrders(Auth::user()->branchId);
        $ordersArray = $orders->toArray(request());
//        dd($ordersArray);
        return view('orders_page', compact('ordersArray'));
    }

    public function detail(Request $request)
    {
        $repository=new OrderRepository();
        $order=$repository->getOrderById($request->input('id'));
        $order=$order->toArray(request());
        return [
            'holderName'=>$order['user']['name'],
            'holderEmail'=>$order['user']['phone'],
            'holderPhone'=>$order['user']['email'],
            'products'=>$order['products'],
            'total'=>$order['total'],
            'statusName'=>$order['statusName'],
            'orderDate'=>$order['orderDate'],
        ];



    }

}
