<?php

/*
|--------------------------------------------------------------------------
| Local Routes
|--------------------------------------------------------------------------
|
| This routes will only work if the application environment is local
|
*/

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'artisan/{shield_access_key}'], function () {
    Route::get('{cmd}', function ($shield_access_key, $cmd) {
        Artisan::call($cmd);

        return Artisan::output();
    });
});
