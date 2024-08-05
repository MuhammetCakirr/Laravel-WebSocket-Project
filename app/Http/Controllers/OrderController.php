<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(CreateOrderRequest $request)
    {
      $validatedData=collect($request->validated());
      $service=new OrderService();
      $service->index($validatedData);


    }

}
