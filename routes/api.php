<?php

use App\Http\Controllers\AnalyticController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EpikkaController;
use App\Http\Controllers\MsgController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Rutas protegidas para usuario Autenticados
Route::middleware('auth:sanctum')->group(function(){
   Route::get('/user', function (Request $request) {
    return $request->user();

});

   Route::post('/logout',[AuthController::class,'logout']);
   Route::apiResource('/users',UserController::class);//Utilizamos todas las rutas para el manejo de USUARIOS
   Route::apiResource('/msg',MsgController::class);
   //Traemos los datos de Eppika
   Route::apiResource('/epikkamsg',EpikkaController::class); 
   Route::get('/report',[AnalyticController::class,'report']);
   Route::get('/date',[AnalyticController::class,'getSumDate']);
   Route::get('/url',[AnalyticController::class,'getSumSection']);
});

//Autenticacion de usuarios
Route::post('/signup',[AuthController::class,'signup']);
Route::post('/login',[AuthController::class,'login']);

//Analiticas
Route::post('/data',[AnalyticController::class,'trackVisit']);


//Insertamos un registro en Eppika solo del sitio web (sin autenticacion)
Route::post('/enviar',[EpikkaController::class,'storeEpikka']);

//Insertamos un registro en Epsiweb
Route::post('/send',[MsgController::class,'store']);

//Traemos los datos de EpsiWeb
//Route::get('/msg',[MsgController::class,'index']);


