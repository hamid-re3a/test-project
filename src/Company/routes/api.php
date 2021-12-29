<?php

use Company\Http\Controllers\CityController;
use Company\Http\Controllers\CompanyController;
use Company\Http\Controllers\ProvinceController;
use Illuminate\Support\Facades\Route;

Route::middleware('user_activity')->group(function () {

   Route::middleware(['auth', 'block_user'])->group(function () {

       Route::prefix('customer')->name('customer.')->group(function () {
            Route::resource('companies' , CompanyController::class,['only' => ['index', 'store','show','update','destroy']]);
            Route::resource('provinces' , ProvinceController::class,['only' => ['index', 'store','show','update','destroy']]);
            Route::resource('cities' , CityController::class,['only' => ['index', 'store','show','update','destroy']]);

       });

    });
});
