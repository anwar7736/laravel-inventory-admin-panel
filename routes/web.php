<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('home');
});




Route::group(['middleware'=>'auth'], function(){

    Route::controller(ProfileController::class)->group(function(){
        Route::view('/profile', 'profile')->name('profile');
        Route::post('/update_profile', 'updateProfile')->name('update.profile');
        Route::post('/change_password', 'changePassword')->name('password.change');
    });

    Route::controller(StockController::class)->group(function(){
        Route::get('/manage-stock', 'index')->name('manage.stock');
        Route::post('/manage-stock', 'store')->name('stock.store');
        Route::get('/add-item-row', 'addItemRow')->name('row.add');
    });

    Route::resource('product', ProductController::class);

});

