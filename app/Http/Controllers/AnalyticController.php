<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnalyticResource;
use App\Models\Analytic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AnalyticController extends Controller
{
    public function trackVisit(Request $request)
    {
        $url = Analytic::create($request->all());

        return response()->json(['message'=>'Gracias por su visita']);
    }

    public function report()
    {
       /* $sortField = request('sort_field','created_at');
        $sortDirection = request('sort_direction','desc');

        $query = Analytics::query()
           ->orderBy($sortField,$sortDirection);*/

           return AnalyticResource::collection(
            Analytic::query()->orderBy('id','desc')->get());
        

    }

    public function getSumDate ()
    {
        $results = Analytic::select('id',
        DB::raw("sum(display) as total_display"),
        DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y')) as my_date"))  
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')"))
        ->get();
    

         return response()->json($results);
    }

    public function getSumSection()
    {
        $results = Analytic::select(DB::raw('sum(display) as total, url as section'))
                   ->groupBy('url')
                   ->get();
        
        
        return response()->json($results);
    }
}
