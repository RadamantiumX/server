<?php

namespace App\Http\Controllers;

use App\Http\Requests\EpikkamsgRequest;
use App\Http\Resources\EpikkaResource;
use Illuminate\Http\Request;

use App\Models\Epikkamsg;
use Illuminate\Support\Facades\Http;

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

    public function storeEpikka(Request $request)
    {

        $data = $request->validate([
            'nombre'=>'required|max:30',
            'email'=>'required|email',
            'telefono'=>'required|max:30',
            'mensaje'=>'required|max:300'
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify',[
            'secret'=>'6LdHto8nAAAAAHetFPez69KSzv0UBWkcF9t75jJC',
            'response'=>$request->input('g-recaptcha-response')
        ])->object();

        /*if($response->success && $response->score >= 0.7){
            return "Usuario real";
        }else{
            return "Es un bot";
        }*/
       

        
        
        
        $epikkamsg = Epikkamsg::create($data);

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
