<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;//Importamos la definicion de las reglas del password

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;//Si esta en "false" poner en "true"
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email'=>'required|email|exists:users,email',//Exista en la tabla "users" en la columna "email"
            'password'=>'required'//Establecemos las reglas del password
        ];
    }
}
