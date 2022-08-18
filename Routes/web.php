<?php

use Modules\Medicine\Http\Controllers\UnitController;
use Modules\Medicine\Http\Controllers\CategoryController;
use Modules\Medicine\Http\Controllers\MedicineController;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function (){
    Route::resource('medicines', MedicineController::class);
    Route::resource('categories', CategoryController::class);
});
