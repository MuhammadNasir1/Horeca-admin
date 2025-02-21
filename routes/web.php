<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\ordersController;
use App\Http\Controllers\productController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

// language route
Route::get('/lang', [userController::class, 'language_change']);
// Authentication
Route::post('login', [authController::class, 'login']);
Route::match(['get',  'post'], 'weblogout', [authController::class, 'weblogout']);

Route::get('/login', function () {
    return view('login');
});
Route::get('/notifications', function () {
    return view('notification');
});
Route::get('/error', function () {
    return view('error');
});


Route::get('/',  function () {
    return view('website.home');
});
Route::middleware('custom')->group(function () {
    Route::get('/setting', [authController::class, 'settingdata']);
    Route::post('updateSettings', [authController::class, 'updateSet']);
    Route::get('/admin', [userController::class, 'Dashboard']);
    Route::get('help', function () {
        return view('help');
    });


    /// report data
    //  Route::get('report', function () {
    //      return view('report');
    //     });
    Route::get('/report', [ordersController::class,  'reportData']);


    Route::get('/orders', [ordersController::class, 'orders']);
    Route::get('/createOrder', [ordersController::class, 'index']);



    // product CRUD
    Route::get('/product', [productController::class,  'productData']);
    Route::post('/addProduct', [productController::class,  'insert']);
    Route::get('/delProduct/{id}', [productController::class,  'delete']);
    Route::get('/productData', [productController::class,  'getProducts']);
    Route::get('/singleproductData/{product_id}', [productController::class,  'SingleproductData']);
    Route::get('/ProductUpdataData/{product_id}', [productController::class,  'ProductUpdataData']);
    Route::post('/UpdataProduct/{product_id}', [productController::class,  'UpdataProduct']);
    Route::get('/deleteMultipleProduct', [productController::class,  'deleteMultipleProduct']);

    Route::get('/product/{ids}', [productController::class,  'getProductData']);

    // Order
    Route::post('/addOrder', [ordersController::class,  'insert']);
    Route::get('/delOrder/{order_id}', [ordersController::class,  'delete']);
    Route::post('/addUpdatedOrder/{order_id}', [ordersController::class,  'addUpdatedOrder']);
    Route::get('/getOrderStatus/{order_id}', [ordersController::class,  'getOrderStatus']);
    Route::post('/updateOrderStatus/{order_id}', [ordersController::class,  'updateOrderStatus']);

    // Invoice pages


    // Excel data import
    Route::post('/product/import', [productController::class,  'importExcelData']);

    // customers CRUD
    Route::get('/customers', [userController::class,  'customers']);
    Route::post('/addCustomer', [userController::class,  'addAdminCustomer']);
    Route::get('/delCustomer/{user_id}', [userController::class,  'delCustomer']);
    Route::get('/CustomerUpdateData/{user_id}', [userController::class,  'CustomerUpdateData']);
    Route::post('/CustomerUpdate/{user_id}', [userController::class,  'CustomerUpdate']);
    // change user verification
    Route::post('/changeVerStatus/{user_id}', [userController::class,  'changeVerifictionStatus']);


    // Category CRUD
    Route::get('/category', [productController::class,  'categories']);
    Route::post('/addCategory', [productController::class,  'insertCategory']);
    Route::get('/delCategory/{id}', [productController::class,  'deleteCategory']);
    Route::post('/updateCategory/{id}', [productController::class,  'updateCategory']);
    Route::get('/updateCategory/{id}', [productController::class,  'updateCategoryData']);

    Route::get('/categoryEditData/{id}', [productController::class,  'categoryEditData']);


    Route::get('/subcategoriesFilter', [productController::class,  'subcategoriesFilter']);

    Route::get('/order/{id}', [ordersController::class,  'EditOrder']);


    // brands CRUD
    Route::get('/brands', [BrandsController::class,  'index']);
    Route::post('/addBrand', [BrandsController::class,  'insert']);
    Route::get('/delBrand/{id}', [BrandsController::class,  'delete']);
    Route::post('/updateBrand/{id}', [BrandsController::class,  'updateBrand']);

    Route::get('/brandEditData/{id}', [BrandsController::class,  'brandEditData']);
});
Route::get('/invoice/{order_id}', [ordersController::class,  'getOrderData'])->name('invoice');
Route::get('/gatepass/{order_id}', [ordersController::class,  'getOrderData'])->name('gatepass');

Route::post('emailsend', [userController::class, 'sendmail']);
