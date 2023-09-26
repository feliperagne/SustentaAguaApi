<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        
        json_decode($user);
        $user->save();
        return [
            'status' => '1',
            'data' => $user
        ];
    }

    public function getNomeUsuarioPeloUsername($username){
        $user = User::where('username', $username)->first();
    
        if(!$user){
            return [
                'status' => 'false',
                'message' => 'Usuário não cadastrado no sistema!'
            ];
        }
    
        return [
            'status' => 'true',
            'data'=> [
                'nome' => $user->name
            ],
        ];
    }
    
    
    

    public function index()
    {
        $obj = new User();
        $user = $obj->all()->where('ativo', 1)->values();

        return [
            "status" => true,
            'data' => $user
        ];
    }

    public function show(User $user)
    {
        return [
            "status" => true,
            "data" => $user
        ];
    }

}
