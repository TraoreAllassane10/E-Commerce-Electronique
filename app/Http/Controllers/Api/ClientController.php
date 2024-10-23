<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return response()->json([
            "status_code" => 200,
            "message" => "Tous les clients",
            "data" => User::where("admin" , 0)->get()
        ]);
    }
}
