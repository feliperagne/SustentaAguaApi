<?php
namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller{
   
public function login(LoginRequest $request)
{
    $credentials = $request->all();

    if (Auth::attempt($credentials)) {
        return response()->json(['message' => 'Logado com sucesso!']);
    }

    // Credenciais incorretas
    return response()->json(['message' => 'Nome de usuário ou senha incorretos'], 401);
}

public function logout(Request $request)
{
    Auth::logout();
    return response()->json(['message' => 'Deslogado com sucesso!']);
}

public function checarLogin()
{
    return response()->json(['authenticated' => Auth::check()]);
}

}