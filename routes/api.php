<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|------------------------
| USERS
|------------------------
*/
Route::get('users', 'App\Http\Controllers\ApiController@getAllUsers');
Route::get('users/{id}', 'App\Http\Controllers\ApiController@getUser');
Route::post('users', 'App\Http\Controllers\ApiController@createUser');
Route::put('users/{id}', 'App\Http\Controllers\ApiController@updateUser');
Route::delete('users/{id}','App\Http\Controllers\ApiController@deleteUser');



/*
|------------------------
| CONCESSIONAIRES
|------------------------
*/
Route::get('concessionaires', 'App\Http\Controllers\ConcessionaireController@getAllConcessionaires');
Route::get('concessionaires/{cnpj}', 'App\Http\Controllers\ConcessionaireController@getConcessionaire');
Route::post('concessionaires', 'App\Http\Controllers\ConcessionaireController@createConcessionaire');
Route::put('concessionaires/{id}', 'App\Http\Controllers\ConcessionaireController@updateConcessionaire');
Route::delete('concessionaires/{id}', 'App\Http\Controllers\ConcessionaireController@deleteConcessionaire');