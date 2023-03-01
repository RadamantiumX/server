<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function signup(SignupRequest $request)
    {
        $data = $request->validated();

        /** @var \App\Models\User $user */
        $user = User::create([
            'name'=> $data['name'],
            'email'=>$data['email'],
            'role'=>'user',
            'password'=>bcrypt($data['password'])
        ]);

        $token = $user->createToken('main')->plainTextToken;


        //retornamos las variables que necesitamos en el FrontEnd
        //Se transforma en "data" en el Cliente React
        /*return response([
            'user'=> $user,
            'token'=> $token
        ]);*/

        //Tambien podemos utilizarla asi:
        return response(compact('user','token'));
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if(!Auth::attempt($credentials))
        {
             return response([
                'message'=>'Provided email address or password is incorrect'
             ],422);
        }
        /** @var User $user */
        $user = Auth::user();//Obtenemos la info del usuario
        $token = $user->createToken('main')->plainTextToken;

       //Le mandamos lo q nos pide el Cliente
        return response(compact('user','token'));

    }

    public function logout(Request $request)
    {
        /** @var User $user *///Anotacion para saber q es una instacia de User
        $user = $request->user();

        $user->currentAccessToken()->delete();

        return response('',204);//Retornamos el status, no hay nada que retornar
    }
}
