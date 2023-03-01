<?php

namespace App\Http\Controllers;

use App\Http\Resources\EpsiwebResource;
use Illuminate\Http\Request;

use App\Models\Msg;

class MsgController extends Controller
{
    public function index()
    {
        return EpsiwebResource::collection(
            Msg::query()->orderBy('id','desc')->paginate(10)
        );
    }

    public function store(Request $request)
    {
        $msg = Msg::create($request->all());

        return response()->json(['message'=>'Mensaje enviado.. Muchas Gracias!']);

    }

    public function show(Msg $msg)
    {
        return response()->json([
            'msg'=>$msg
        ]);
    }
}
