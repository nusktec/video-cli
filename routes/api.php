<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;

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
//video player router
Route::any('virtual-class/{auth}/{classID}/{encrypted}', function ($auth, $classID, $encrypted) {
    //return main virtual class id
    /*do main job, class attendance based on who visited*/

});

//class listening
Route::any('list/{type}', function ($type) {
    return Response()->json('Hello World ' . $type);
});

//manage class
Route::any('manage/{by}', function ($type) {
    return Response()->json('Hello World ' . $type);
});

//c
Route::any('list/{type}', function ($type) {
    return Response()->json('Hello World ' . $type);
});
