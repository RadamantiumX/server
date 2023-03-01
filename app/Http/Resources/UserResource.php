<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    //public static $wrap = false;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //Recurso q se le pasa al cliente
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'role'=>$this->role,
            'created_at'=>$this->created_at->format('Y-m-d H:i:s')//Es una instacia de CARBON formato de fecha
        ];
    }
}
