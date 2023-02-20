<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Msg;

class MsgController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        $msg = Msg::create($request->all());

        return response()->json(['message'=>'Mensaje enviado.. Muchas Gracias!']);

    }

    public function show()
    {

    }
}
