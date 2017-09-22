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

Route::get('/test', function(){
	return response('(GET method) Api service is looking well!!!');
});
Route::post('/test', function(){
	return response('(POST method) Api service is looking well!!!');
});
Route::put('/test', function(){
	return response('(PUT method) Api service is looking well!!!');
});
Route::patch('/test', function(){
	return response('(PATCH method) Api service is looking well!!!');
});
Route::delete('/test', function(){
	return response('(DELETE method) Api service is looking well!!!');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
