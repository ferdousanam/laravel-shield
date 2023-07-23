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


Route::get('/artisan/{cmd}', function ($cmd) {
    Artisan::call($cmd);

    return Artisan::output();
});
