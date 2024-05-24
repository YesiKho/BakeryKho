<?php

include_once 'app/helpers/route.php';
include_once 'app/controllers/HomeController.php';
include_once 'app/controllers/superAdmin/UsersController.php';
include_once 'app/controllers/admin/ProductController.php';
include_once 'app/controllers/auth/AuthenticatedSessionController.php';
include_once 'app/controllers/auth/RegisteredUserController.php';

# GET
// Route::get('/', 'HomeController::index');
Route::get('/', 'AuthenticatedSessionController::create');
Route::get('register', 'RegisteredUserController::create');

Route::middleware(
    'super_admin',
    [
        Route::resource('products', ProductController::class),
        Route::resource('users', UsersController::class),
    ]
);
Route::middleware(
    'admin',
    [
        Route::resource('products', ProductController::class),
    ]
);

Route::middleware(
    'user',
    [
        Route::get('home', 'HomeController::index'),
    ]
);

# POST
Route::post('login/store', 'AuthenticatedSessionController::store');
Route::post('register/store', 'RegisteredUserController::store');

new Route();
