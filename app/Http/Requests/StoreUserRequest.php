<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
                "username" => "required",
                "email" => "required|unique:users,email|email",
                "password" => "required|min:3",
                'profile_image' => 'required|image|mimes: jpg,jpeg,png|max:6144',
        ];
    }

    public function messages():array{
         return [
            "username.required" => "O campo de nome de usuário é obrigatório.",
            "email.required" => "O campo de email é obrigatório.",
            "email.unique" => "Esse email já está sendo usado por outra pessoa.",
            "email.email" => "Por favor, informe um endereço de email válido.",
            'password.required' => "O campo de senha é obrigatório.",
            "password.min" => "Por favor, informa uma senha com mais de 3 caracteres!",
            'profile_image.required' => 'Adicione uma foto de perfil para você!',
            'profile_image.image' => 'A imagem que você selecionou não é uma imagem válida!',
            'profile_image.mimes' => 'A imagem deve ter apenas os formatos JPG, JPEG e PNG!',
            'profile_image.max' => 'A imagem não deve exceder 6MB!', // Defina o tamanho máximo em bytes
        ];
    }
}
