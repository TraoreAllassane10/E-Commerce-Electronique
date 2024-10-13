<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserSignupRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class UserController extends Controller
{
    public function register(UserSignupRequest $request)
    {
        try {
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->save();

            return response()->json([
                'code_status' => 200,
                'message' => "Utilisateur créé avec succes",
                'data' => $user
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function login(UserLoginRequest $request)
    {
        if (auth()->attempt($request->only(['email', 'password']))) {

            $user = auth()->user();

            $token = $user->createToken("Cle_secret")->plainTextToken;

            return response()->json([
                'code_status' => 200,
                'message' => "Utilisateur connecté",
                'token' => $token,
                'data' => $user
            ]);

        } else {
            return response()->json([
                'code_status' => 201,
                'message' => "Vous n'avez pas de compte",
            ]);
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return response()->json([
            'code_status' => 200,
            'message' => "Utilisateur deconnecté",
        ]);
    }
}
