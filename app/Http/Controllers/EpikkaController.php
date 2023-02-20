<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Epikkamsg;

class EpikkaController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        $epikkamsg = Epikkamsg::create($request->all());

        return response()->json(['message'=>'Mensaje enviado.. Muchas Gracias!']);

    }

    public function show()
    {

    }
}
