<?php

require_once('database.php');

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
            $res['status'] = http_response_code(200);
        }

        return $res;
    }

    static function getByIdOrName($id = null, $name = null)
    {
        global $conn;
        $query = "SELECT * FROM products WHERE id ='$id' OR name = '$name' ";
        $result = $conn->query($query);

        $res = array();

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $res['data'] = $row;
            }
            $res['status'] = http_response_code(200);
        }

        return $res;
    }

    static function insert($product)
    {
        global $conn;
        $name = strtolower(htmlspecialchars($product['name']));
        $product_exist = self::getByIdOrName(null, $name);
        if ($product_exist) {
            return array('status' => 400, 'message' => 'Product ' . $name . ' sudah ada', 'data' => $product_exist['data']);
        }

        $price = htmlspecialchars($product['price']);
        $stock = htmlspecialchars($product['stock']);
        $image = self::uploadImage($name);

        if (isset($image['status'])) {
            if ($image['status'] == 400) {
                return $image;
            }
        }


        $query = 'INSERT INTO products VALUES(NULL, ?, ?, ?, ?)';
        $sql   = $conn->prepare($query);
        $sql->bind_param(
            'ssii',
            $image,
            $name,
            $price,
            $stock,
        );
        try {
            $sql->execute();
        } catch (\Exception $e) {
            $sql->close();
            http_response_code(500);
            die($e->getMessage());
        }
        $sql->close();
        $product_created = self::getByIdOrName(null, $name);
        return array('status' => 201, 'message' => 'Berhasil menambahkan product ' . $name, 'data' => $product_created['data']);
    }

    static function update($product, $product_id)
    {
        global $conn;

        $oldProduct = self::getByIdOrName($product_id, null);

        $name = strtolower(htmlspecialchars($product['name']));
        $price = htmlspecialchars($product['price']);
        $stock = htmlspecialchars($product['stock']);

        $error = $_FILES['image']['error'];

        // cek apakah ada file yang di upload
        if ($error !== 4) {
            $location = "src/assets/images/products/{$oldProduct['data']['image']}";
            if (file_exists($location)) {
                unlink("src/assets/images/products/{$oldProduct['data']['image']}");
            }
            $image = self::uploadImage($name);
            if (isset($image['status'])) {
                if ($image['status'] == 400) {
                    return $image;
                }
            }
        } else if ($error === 4) {
            $image = $oldProduct['data']['image'];
        }

        $query = 'UPDATE products SET 
                    image = ?,
                    name = ?,
                    price = ?,
                    stock = ? WHERE id = ?';
        $sql   = $conn->prepare($query);
        $sql->bind_param(
            'ssiii',
            $image,
            $name,
            $price,
            $stock,
            $product_id,
        );
        try {
            $sql->execute();
        } catch (\Exception $e) {
            $sql->close();
            http_response_code(500);
            die($e->getMessage());
        }
        $sql->close();
        $product_created = self::getByIdOrName($product_id, $name);
        return array('status' => 200, 'message' => 'Berhasil memperbarui product ' . $name, 'data' => $product_created['data']);
    }

    static function delete($product_id)
    {
        global $conn;

        $product_exist = self::getByIdOrName($product_id, null);
        if ($product_exist) {

            $location = "src/assets/images/products/{$product_exist['data']['image']}";
            if (file_exists($location)) {
                unlink("src/assets/images/products/{$product_exist['data']['image']}");
            }

            $query = 'DELETE FROM products WHERE id = ?';
            $sql   = $conn->prepare($query);
            $sql->bind_param(
                'i',
                $product_id
            );
            try {
                $sql->execute();
            } catch (\Exception $e) {
                $sql->close();
                http_response_code(500);
                die($e->getMessage());
            }
            $sql->close();
            return array('status' => '201', "message" => "Berhasil menghapus product {$product_exist['data']['name']}");
        }
        return array('status' => '400', "message" => 'Gagal menghapus product');
    }

    static function uploadImage($title)
    {
        $filename = $_FILES['image']['name'];
        $error = $_FILES['image']['error'];
        $tmpName = $_FILES['image']['tmp_name'];

        // cek apakah tidak ada file yang di upload
        if ($error === 4) {
            return array('status' => 400, 'message' => 'Tidak ada image yang di upload');
        }

        // cek apakah yang diupload adalah gambar
        $extensionValidate = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $filename);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $extensionValidate)) {
            return array('status' => 400, 'message' => 'Gagal menambahkan, extension image tidak valid');
        }

        // generate nama gambar baru
        $title = strtolower(str_replace(' ', '-', $title)) . '-';;
        $title = uniqid($title) . '.' . $imageExtension;
        move_uploaded_file($tmpName, 'src/assets/images/products/' . $title);
        return $title;
    }
}

// header("Content-Type: application/json");
// print_r(json_encode(Product::getByIdOrName(null, 'choco black forest')));

// $data = array(
//     "image" => "cake.png",
//     "name" => "Hazelnut Cake",
//     "price" => 16000,
//     "stock" => 3,
// );

// Product::insert($data);
