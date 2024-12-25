<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;



// admin
Route::group([
    'middleware' => ['auth' , 'role:admin' ],
    'as' => 'admin.',
    'prefix'     => 'admin'
] , function(){

    Route::resource('/', AdminController::class);

    // admin profile
    Route::get('/profile' , [ProfileController::class , 'index'])->name('profile');
    Route::post('/profile/{id}/update' , [ProfileController::class , 'update'])->name('profile.update');
    Route::post('/profile/{id}/update/password' , [ProfileController::class , 'updatePassword'])->name('profile.update.password');

});

// admin login
Route::get('admin/login' , [AdminController::class , 'login'])->name('admin.login');



