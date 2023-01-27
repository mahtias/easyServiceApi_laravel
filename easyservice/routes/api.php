<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

    Route::prefix('v1')->group(function(){

        Route::get('category/all', 'GareController@index');
        Route::get('/prestation/all', 'GareController@shows');

        Route::get('user/all', 'UserController@index');
        Route::get('user/{user}', 'UserController@show');
        Route::post('user/login', 'UserController@userLogin');
        Route::post('user/register', 'UserController@store');
        Route::put('user/update', 'UserController@update');

        Route::group(['middleware' => ['auth:api', 'cors']], function() {
                //
        });

    });

    Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
