<?php

Route::prefix('subsidiaries')->middleware('auth')->group(function() {
    Route::post('/', 'SubsidiaryController@store')->name('subsidiaries.store');
});


Route::prefix('subsidiariesproducts')->middleware('auth')->group(function() {
    Route::post('{product}', 'SubsidiariesProductController@store')->name('subsidiariesproducts.store');
});
