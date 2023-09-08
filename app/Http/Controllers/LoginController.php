<?php
namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller{
public function login(LoginRequest $request)
{
    $credentials = $request->all();
    
    if (Auth::attempt($credentials)) {
        return response()->json(['message' => 'Logado com sucesso!']);
    }

    return response()->json(['message' => 'Você não tem acesso a esse sistema'], 401);
}

public function logout(Request $request)
{
    Auth::logout();
    return response()->json(['message' => 'Logged out successfully']);
}

public function checarLogin()
{
    return response()->json(['authenticated' => Auth::check()]);
}

}