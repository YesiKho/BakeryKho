<?php

include_once 'src/libs/models/products.php';

class ProductController
{
    static function index()
    {
        view('pages.admin.products.index', ['products' => Product::getAll()]);
    }

    static function create()
    {
        return view('pages.admin.products.create');
    }

    static function store()
    {
        $res = Product::insert($_POST['product']);
        if ($res['status'] == 201) {
            header('Location: ' . BASEURL . 'products');
        }
    }

    static function edit()
    {
        view('pages.admin.products.edit', ['product' => Product::getById($_GET['product_id'])]);
    }

    static function update()
    {
        $item = Product::getById($_POST['product']['product_id']);

        if ($item['status'] == 200) {
            $res = Product::update($_POST['product'], $item['data']['product_id']);
        }

        if ($res['status'] == 200) {
            header('Location: ' . BASEURL . 'products');
        }
    }

    static function destroy()
    {
        $item = Product::getById($_GET['product_id']);

        if ($item['status'] == 200) {
            $res = Product::delete($item['data']['product_id']);
        }

        print_r($res);
        if ($res['status'] == 200) {
            header('Location: ' . BASEURL . 'products');
        }
    }
}
