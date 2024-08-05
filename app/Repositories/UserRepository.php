<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;

class UserRepository
{
    public function create(string $name,string $phone,string $email,string $password):User
    {
           return User::query()->create(
               [
                   "name"=>$name,
                   "email"=>$email,
                   "password"=>Hash::make($password),
                   "phone"=>$phone
               ]
           );
    }
}
