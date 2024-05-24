<?php

require_once __DIR__ . '/../../config/database.php';

class Product
{
    static function getAll()
    {
        global $conn;
        $query = "SELECT * FROM products";
        $result = $conn->query($query);

        $res = array('data' => []);

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($res['data'], $row);
            }
        }
        $res['status'] = 200;

        return $res;
    }

    static function getByID($id = null)
    {
        global $conn;
        $query = "SELECT * FROM products WHERE product_id ='$id'";
        $result = $conn->query($query);

        $res = array();

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $res['data'] = $row;
            }
            $res['status'] = 200;
        }

        return $res;
    }

    static function getByTitle($title = null)
    {
        global $conn;
        $query = "SELECT * FROM products WHERE title = '$title' ";
        $result = $conn->query($query);

        $res = array();

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $res['data'] = $row;
            }
            $res['status'] = 200;
        }

        return $res;
    }

    static function searchProduct($search = null)
    {
        global $conn;
        $query = "SELECT * FROM products WHERE title LIKE '%$search%'";
        $result = $conn->query($query);

        $res = array('data' => []);

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($res['data'], $row);
            }
        }
        $res['status'] = 200;

        return $res;
    }

    static function create($product)
    {
        global $conn;
        extract($product);
        $product_exist = self::getByTitle($title);
        if ($product_exist) {
            return array('status' => 400, 'message' => 'This product title already exists. Please choose a different title.', 'data' => $product_exist['data']);
        }

        $error = $_FILES['image']['error'];

        // cek apakah tidak ada file yang di upload
        if ($error === 4) {
            $image = 'cake.png';
        } else {
            // ada file yang di upload
            $image = self::uploadImage($title);
            if (isset($image['status'])) {
                if ($image['status'] == 400) {
                    return $image;
                }
            }
        }

        $query = 'INSERT INTO products VALUES(NULL, ?, ?, ?, ?, ?, NOW(), NULL, NULL)';
        $sql   = $conn->prepare($query);
        $sql->bind_param(
            'sssii',
            $title,
            $description,
            $image,
            $price,
            $stock,
        );
        try {
            $sql->execute();
        } catch (\Exception $e) {
            $sql->close();
            500;
            die($e->getMessage());
        }
        $sql->close();
        $product_created = self::getByTitle($title);
        return array('status' => 201, 'message' => "Successfully added new product <b>{$title}</b>.", 'data' => $product_created['data']);
    }

    static function update($product, $product_id)
    {
        global $conn;

        extract($product);

        $default_image = 'cake.png';

        $oldProduct = self::getById($product_id);

        $product_exist = self::getByTitle($title);
        if ($product_exist && $product_exist['data']['product_id'] !== $product_id) {
            return array('status' => 400, 'message' => 'This product title already exists. Please choose a different title.', 'data' => $product_exist['data']);
        }

        $error = $_FILES['image']['error'];

        // cek apakah ada file yang di upload
        if ($error !== 4) {
            $location = "public/images/products/{$oldProduct['data']['image']}";
            if (file_exists($location) && $oldProduct['data']['image'] !== $default_image) {
                unlink($location);
            }
            $image = self::uploadImage($title);
            if (isset($image['status'])) {
                if ($image['status'] == 400) {
                    return $image;
                }
            }
        } else if ($error === 4) {
            $image = $oldProduct['data']['image'];
        }

        $query = 'UPDATE products SET 
                    title = ?,
                    description = ?,
                    image = ?,
                    price = ?,
                    stock = ?,
                    updated_at = NOW() WHERE product_id = ?';
        $sql   = $conn->prepare($query);
        $sql->bind_param(
            'sssiii',
            $title,
            $description,
            $image,
            $price,
            $stock,
            $product_id,
        );
        try {
            $sql->execute();
        } catch (\Exception $e) {
            $sql->close();
            500;
            die($e->getMessage());
        }
        $sql->close();
        $product_updated = self::getById($product_id);
        return array('status' => 200, 'message' => "The product <b>{$title}</b> has been successfully updated.", 'data' => $product_updated['data']);
    }

    static function delete($product_id)
    {
        global $conn;

        $default_image = 'cake.png';

        $product_exist = self::getById($product_id);
        if ($product_exist) {

            $location = "src/assets/images/products/{$product_exist['data']['image']}";
            if (file_exists($location) && $product_exist['data']['image'] !== $default_image) {
                unlink("src/assets/images/products/{$product_exist['data']['image']}");
            }

            $query = 'DELETE FROM products WHERE product_id = ?';
            $sql   = $conn->prepare($query);
            $sql->bind_param(
                'i',
                $product_id
            );
            try {
                $sql->execute();
            } catch (\Exception $e) {
                $sql->close();
                500;
                die($e->getMessage());
            }
            $sql->close();
            return array('status' => 200, "message" => "<b>{$product_exist['data']['title']}</b> has been successfully removed.");
        }
        return array('status' => 400, "message" => "An error occurred while trying to delete <b>{$product_exist['data']['title']}</b>. Please try again.");
    }

    static function uploadImage($title)
    {
        $filename = $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];

        // cek apakah yang diupload adalah gambar
        $extensionValidate = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $filename);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $extensionValidate)) {
            return array('status' => 400, 'message' => "Failed to add image for <b>{$title}</b>. Invalid image file extension.");
        }

        // generate nama gambar baru
        $title = strtolower(str_replace(' ', '-', $title)) . '-';;
        $title = uniqid($title) . '.' . $imageExtension;
        move_uploaded_file($tmpName, 'public/images/products/' . $title);
        return $title;
    }
}
