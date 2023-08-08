<?php

namespace App\Http\Controllers;

use App\Http\Resources\EpikkaResource;
use Illuminate\Http\Request;

use App\Models\Epikkamsg;

class EpikkaController extends Controller
{
    public function index()
    {
        $perPage = request('per_page',5);
        $search = request('search','');
        $sortField = request('sort_field','created_at');
        $sortDirection = request('sort_direction','desc');

        $query = Epikkamsg::query()
          ->orderBy($sortField,$sortDirection)
          ->paginate($perPage);

       return EpikkaResource::collection($query);  
    }

    public function store(Request $request)
    {
        $epikkamsg = Epikkamsg::create($request->all());

        return response()->json(['message'=>'Mensaje enviado.. Muchas Gracias!']);

    }

    public function show(Epikkamsg $epikkamsg)
    {
        return response()->json([
            'msg'=>$epikkamsg
        ]);
    }
    public function destroy(Epikkamsg $epikkamsg)
    {
        $epikkamsg->delete();
        return response()->noContent();
    }
}
