<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\coursesController;
use App\Http\Controllers\parentController;
use App\Http\Controllers\productController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\teachingController;
use App\Http\Controllers\trainingController;
use App\Http\Controllers\userController;
use App\Models\training;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\ParallelConsoleOutput;

// language route
Route::get('/lang', [userController::class, 'language_change']);
// Authentication
Route::post('login', [authController::class, 'login']);
Route::match(['get',  'post'], 'weblogout', [authController::class, 'weblogout']);

Route::get('/login', function () {
    return view('login');
});


Route::middleware('custom')->group(function () {
    Route::get('/setting', [authController::class, 'settingdata']);
    Route::post('updateSettings', [authController::class, 'updateSet']);
    Route::get('/', [userController::class, 'Dashboard']);

    Route::get('help', function () {
        return view('help');
    });
    Route::get('orders', function () {
        return view('orders');
    });
    Route::get('createOrder', function () {
        return view('createOrder');
    });


    // product CRUD
    Route::get('/product', [productController::class,  'productData']);
    Route::post('/addProduct', [productController::class,  'insert']);
    Route::get('/delProduct/{id}', [productController::class,  'delete']);
});


Route::get('email', function () {
    return view("emails.parent");
});
