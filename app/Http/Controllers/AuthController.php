<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalLoginRequest;
use App\Http\Requests\UserLoginRequest;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        $validatedData=collect($request->validated());

        if (Auth::attempt(['email' => $validatedData->get('email'), 'password' => $validatedData->get('password')])) {
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

    public function loginMethodForPersonal(PersonalLoginRequest $request)
    {
        $validatedData=collect($request->validated());
        $personal = Personal::query()->where('email', $validatedData->get('email'))->with('branche')->first();

        if ($personal && Hash::check($validatedData->get('password'), $personal->password)) {
            Auth::login($personal);
//            dd(Auth::user());
            return redirect()->intended('orders');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
