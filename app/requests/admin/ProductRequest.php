<?php

include_once 'app/helpers/FormRequest.php';

class ProductRequest extends FormRequest
{

    public static function validate($product)
    {
        $title = self::stringValidate($product['title']);
        $description = self::stringValidate($product['description']);
        $price = self::integerValidate($product['price']);
        $stock = self::integerValidate($product['stock']);

        $validated = [];

        if (strlen($title) < 1) {
            $validated['error']['title'] = 'Title is required. Please fill in this field.';
        } elseif (strlen($title) > 255) {
            $validated['error']['title'] = 'Please enter a title with a maximum of 255 characters.';
        }

        if (strlen($description) < 1) {
            $validated['error']['description'] = 'Description is required. Please fill in this field.';
        } elseif (strlen($description) > 255) {
            $validated['error']['description'] = 'Please enter a description with a maximum of 255 characters.';
        }

        if (strlen($price) < 1) {
            $validated['error']['price'] = 'Price is required. Please fill in this field.';
        }

        if (strlen($stock) < 1) {
            $validated['error']['stock'] = 'Stock is required. Please fill in this field.';
        }

        $validated['data'] = [
            'title' => $title,
            'description' => $description,
            'price' => $price,
            'stock' => $stock,
        ];

        return $validated;
    }
}
