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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::get('/productos', 'ProductoController@index');
Route::post('/upload-file', 'ProductoController@uploadFile');
Route::get('/productos/{producto}', 'ProductoController@show');

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/users','UserController@index');
    Route::get('users/{user}','UserController@show');
    Route::patch('users/{user}','UserController@update');
    Route::get('users/{user}/pedidos','UserController@showPedidos');
    Route::patch('productos/{producto}/stock/add','ProductoController@updateStock');
    Route::patch('pedidos/{pedido}/status','PedidoController@status');
    Route::resource('/pedidos', 'PedidoController');
    Route::resource('/productos', 'ProductoController')->except(['index','show']);
});
