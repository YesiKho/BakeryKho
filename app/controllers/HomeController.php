<?php

require 'app/models/products.php';

class HomeController
{

    static function index()
    {
        view('pages.user.index', ['products' => Product::getAll()]);
    }
}
