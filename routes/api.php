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

/*
|------------------------
| DEPARTMENTS
|------------------------
*/
Route::get('departments', 'App\Http\Controllers\DepartmentController@getAllDepartments');
Route::get('departments/{acronym}', 'App\Http\Controllers\DepartmentController@getDepartment');
Route::post('departments', 'App\Http\Controllers\DepartmentController@createDepartment');
Route::put('departments/{id}', 'App\Http\Controllers\DepartmentController@updateDepartment');
Route::delete('departments/{id}', 'App\Http\Controllers\DepartmentController@deleteDepartment');

/*
|------------------------
| CONCESSIONAIRE_DEPARTMENTS
|------------------------
*/
Route::post('linkEntities', 'App\Http\Controllers\ConcessionaireDepartmentController@create');
Route::get('departmentsByConcessionaires/{cnpj}', 'App\Http\Controllers\ConcessionaireController@getDepartmentsByConcessionaire');
Route::get('concessionairesByDepartment/{acronym}', 'App\Http\Controllers\DepartmentController@getConcessionairesByDepartment');