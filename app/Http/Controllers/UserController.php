<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function store(StoreUserRequest $request)
    {
        dd($request->all());
        $user = User::create($request->all());
        if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
            $profileImageName = uniqid('profile_') . '.' . $request->file('profile_image')->extension();
            $request->file('profile_image')->storeAs('profile_images', $profileImageName, 'public');
    
            // Salva o caminho da imagem no banco de dados
            $user->profile_image = 'profile_images/' . $profileImageName;
            $user->save();
        }
    
        return [
            'status' => 1,
            'data' => $user,
            'profile_image' => $user->profile_image ?? null,
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
