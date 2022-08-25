<?php

use Modules\Medicine\Http\Controllers\CategoryController;
use Modules\Medicine\Http\Controllers\LeafController;
use Modules\Medicine\Http\Controllers\MedicineController;
use Modules\Medicine\Http\Controllers\TypeController;
use Modules\Medicine\Http\Controllers\UnitController;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::resource('categories', CategoryController::class)->except('show');
    Route::resource('units', UnitController::class)->except('show');
    Route::resource('types', TypeController::class)->except('show');
    Route::resource('leafs', LeafController::class)->except('show');
    Route::post('medicines/search-manufacturer', [MedicineController::class, 'searchManufacturer'])->name('medicines.search-manufacturer');
    Route::get('medicines/{medicine}/show-qr-codes', [MedicineController::class, 'showQrCoders'])->name('medicines.show-qr-codes');
    Route::get('medicines/{medicine}/show-bar-codes', [MedicineController::class, 'showBarCoders'])->name('medicines.show-bar-codes');
    Route::resource('medicines', MedicineController::class);
});
