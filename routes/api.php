<?php

use Illuminate\Http\Request;

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

//rotas do User
Route::get('listaUsers', 'UserController@listUser');
Route::get('mostraUser/{id}', 'UserController@showUser');
Route::post('criaUser', 'UserController@createUser');
Route::put('atualizaUser/{id}', 'UserController@updateUser');
Route::delete('deletaUser/{id}', 'UserController@deleteUser');


//rotas do Post
Route::get('listaPosts', 'PostController@listPost');
Route::get('mostraPost/{id}', 'PostController@showPost');
Route::post('criaPost', 'PostController@createPost');
Route::put('atualizaPost/{id}', 'PostController@updatePost');
Route::delete('deletaPost/{id}', 'PostController@deletePost');