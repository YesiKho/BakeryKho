<?php
include_once 'src/libs/controllers/admin/ProductController.php';
include_once 'src/libs/functions/route.php';

# GET
Route::get('/', 'ProductController::index');
Route::resource('products', ProductController::class);

new Route();
