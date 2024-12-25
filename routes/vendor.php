<?php

use App\Http\Controllers\Backend\VendorController;
use Illuminate\Support\Facades\Route;


// vendor

Route::group([
    'middleware' => ['auth' , 'role:vendor' ],
    'as' => 'vendor.',
    'prefix'     => 'vendor'
] , function(){

    Route::resource('/', VendorController::class);

});



