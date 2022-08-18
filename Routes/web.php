<?php

use Modules\Medicine\Http\Controllers\TypeController;
use Modules\Medicine\Http\Controllers\UnitController;
use Modules\Medicine\Http\Controllers\LeafController;
use Modules\Medicine\Http\Controllers\CategoryController;
use Modules\Medicine\Http\Controllers\MedicineController;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function (){
    Route::resource('categories', CategoryController::class)->except('show');
    Route::resource('units', UnitController::class)->except('show');
    Route::resource('types', TypeController::class)->except('show');
    Route::resource('leafs', LeafController::class)->except('show');
    Route::resource('medicines', MedicineController::class);
});
