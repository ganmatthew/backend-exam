<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{id}', 'CategoryController@show');
Route::post('/categories', 'CategoryController@store');
Route::put('/categories/{id}', 'CategoryController@update');
Route::delete('/categories/{id}', 'CategoryController@destroy');

Route::get('/items', 'ItemController@index');
Route::get('/items/{id}', 'ItemController@show');
Route::post('/items', 'ItemController@store');
Route::put('/items/{id}', 'ItemController@update');
Route::delete('/items/{id}', 'ItemController@destroy');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

