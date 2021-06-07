<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscribeController;
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
Route::group(['prefix' => 'v1/'], function()
{
    Route::post('subscribe/{topic}/{email}',SubscribeController::class.'@subscribe')->name('subscribe');
    Route::delete('subscribe/all/{email}',SubscribeController::class.'@unsubscribeAll')->name('unsubscribe.all');
    Route::delete('subscribe/{topic}/{email}',SubscribeController::class.'@unsubscribe')->name('unsubscribe');
});

