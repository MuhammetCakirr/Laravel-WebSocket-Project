<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

//        dd($email,$password);
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            $token = $user->createToken('token-name')->plainTextToken;


            $data = [
                'status' => 200,
                'message' => 'Login was made successfully.',
                'token' => $token,
            ];
        } else {

            $data = [
                'status' => 400,
                'message' => 'User for this information could not be found.The wrong password or email.',

            ];
        }

        return response()->json($data);
    }
}
