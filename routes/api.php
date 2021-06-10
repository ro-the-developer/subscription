<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\AuthController;
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

Route::group(['prefix' => 'v1/'], function()
{
    Route::post('subscribe/{topic}/{email}',SubscribeController::class.'@subscribe')->name('subscribe');
    Route::delete('subscribe/all/{email}',SubscribeController::class.'@unsubscribeAll')->name('unsubscribe.all');
    Route::delete('subscribe/{topic}/{email}',SubscribeController::class.'@unsubscribe')->name('unsubscribe');
    Route::group(['middleware' => ['auth:api']], function() {
        Route::get('subscriptions/email/{email}',SubscribeController::class.'@listByEmail')->name('list.by.email');
        Route::get('subscriptions/topic/{topic}',SubscribeController::class.'@listByTopic')->name('list.by.topic');
    });
    Route::post('auth/gettoken',AuthController::class.'@getToken')->name('auth.get.token');
});

