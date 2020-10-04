<?php

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

Route::group(['prefix' => '/v1', 'namespace' => 'Api\v1'], function () {
    Route::get('/channels', 'ChannelController');
    Route::group(['prefix' => '/channels/{channel}'], function () {
        Route::get('/{date}/timezone/{timeZone}', 'TimeTableController')
            ->where('timeZone', '[A-Za-z0-9_/-]+');
        Route::get('/programmes/{programme:id}', 'ProgrammeController');
    });
});