<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        $message = 'User register successfully';

        $response = [
            'message' => $message,
        ];

        return response()->json($response);
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = User::where('email', $request['email'])->first();

        if (Auth::attempt($credentials)){

            $message = 'User login successfully';

            $token = $user->createToken('auth_token')->plainTextToken;


            return response()
            ->json(['access_token' => $token,
                    'token_type' => 'Bearer',
                    'user' => $user,
                    'message' => $message,
            ]);

        }
        else {
            $message = 'Unauthorised';

            return response()->json($message, 401);
        }

    }

    public function logout(Request $request)
    {
        $user = User::where('email', $request['email'])->firstOrFail();

        $user->tokens()->delete();
        $respon = [
            'status' => 'success',
            'msg' => 'Logout successfully',
            'errors' => null,
            'content' => null,
        ];
        return response()->json($respon, 200);

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }
}
