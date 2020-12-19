<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\prodactcontroller;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/creat',[prodactcontroller::class,'create']);
Route::post('/addUser',[AuthController::class,'Register']);
Route::post('/creatcateg',[CategoryController::class,'createcategorie']);
Route::get('/index',[prodactcontroller::class,'index']);
Route::get('/indexlistproduit',[prodactcontroller::class,'indexlistproduit']);
Route::get('/editproduit/{id}',[prodactcontroller::class,'edit']);
Route::delete('/produit/{id}',[prodactcontroller::class,'destroy']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/logout',[AuthController::class,'logout']);

});
