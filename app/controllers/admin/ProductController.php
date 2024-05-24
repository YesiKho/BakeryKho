<?php

include_once 'app/models/products.php';
include_once 'app/helpers/route.php';
include_once 'app/requests/admin/ProductRequest.php';
include_once 'app/helpers/Flasher.php';
include_once 'app/helpers/FormAlert.php';

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
        $productValidate = ProductRequest::validate($_POST['product']);

        if (isset($productValidate['error'])) {
            FormAlert::setFormAlert($productValidate['error'], $productValidate['data']);
            header('Location: ' . route('products.create'));
            exit;
        }

        $res = Product::create($productValidate['data']);
        if (str_split($res['status'])[0] == 2) {
            Flasher::setFlash($res['status'], $res['message'], $res['data']);
            header('Location: ' . route('product'));
            exit;
        } elseif (str_split($res['status'])[0] == 4) {
            Flasher::setFlash($res['status'], $res['message'], $res['data']);
            header('Location: ' . route('products.create'));
            exit;
        }
    }

    static function edit(string $id)
    {
        view('pages.admin.products.edit', ['product' => Product::getById($id)]);
    }

    static function update(string $id)
    {
        $item = Product::getById($id);

        $productValidate = ProductRequest::validate($_POST['product']);
        if (isset($productValidate['error'])) {
            FormAlert::setFormAlert($productValidate['error'], $productValidate['data']);
            header('Location: ' . route("products.edit?product_id={$item['data']['product_id']}"));
            exit;
        }
        $res = Product::update($productValidate['data'], $item['data']['product_id']);
        if (str_split($res['status'])[0] == 2) {
            Flasher::setFlash($res['status'], $res['message'], $res['data']);
            header('Location: ' . route('product'));
            exit;
        } elseif (str_split($res['status'])[0] == 4) {
            Flasher::setFlash($res['status'], $res['message'], $res['data']);
            header('Location: ' . route("products.edit?product_id={$item['data']['product_id']}"));
            exit;
        }
    }

    static function destroy(string $id)
    {
        $item = Product::getById($id);

        if ($item['status'] == 200) {
            $res = Product::delete($item['data']['product_id']);
        }

        if ($res['status'] == 200) {
            Flasher::setFlash($res['status'], $res['message']);
            header('Location: ' . BASEURL . 'product');
            exit;
        }
    }
}
