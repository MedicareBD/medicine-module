<?php

use Modules\Medicine\Http\Controllers\MedicineController;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function (){
    Route::resource('medicines', MedicineController::class);
});
