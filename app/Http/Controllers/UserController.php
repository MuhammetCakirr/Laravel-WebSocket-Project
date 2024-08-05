<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createAccount(UserCreateRequest $request)
    {
        $validatedData=collect($request->validated());

        $repository=new UserRepository();

        $user=$repository->create($validatedData->get('name'),$validatedData->get('phone'),
                                  $validatedData->get('email'),$validatedData->get('password'));

        return "oluşturuldu";
    }
}
