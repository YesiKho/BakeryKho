<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/roles.php';

class Users
{
    static function authenticate($auth)
    {
        extract($auth['data']);
        $user_exist = self::getByEmail($email);

        if (!$user_exist) {
            return array('status' => 401, 'message' => 'Email yang digunakan tidak ditemukan', 'data' => $email);
        }

        if ($user_exist['data']['password'] !== $password) {
            return array('status' => 401, 'message' => 'Password yang anda masukkan salah!', 'data' => $email);
        }
        $role = Roles::getByID($user_exist['data']['role_id'])['data']['title'];
        $user = array(
            'user_id' => $user_exist['data']['user_id'],
            'name' => $user_exist['data']['name'],
            'email' => $user_exist['data']['email'],
            'role' => $role,
        );

        return array('status' => 200, 'data' => $user);
    }

    static function getAll()
    {
        global $conn;
        $query = "SELECT * FROM users";
        $result = $conn->query($query);

        $res = array('data' => []);

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $row['role'] = Roles::getByID($row['role_id'])['data']['title'];
                unset($row['role_id']);
                array_push($res['data'], $row);
            }
        }
        $res['status'] = 200;

        return $res;
    }

    static function getByID($id = null)
    {
        global $conn;
        $query = "SELECT * FROM users WHERE user_id ='$id'";
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

    static function getByEmail($email = null)
    {
        global $conn;
        $query = "SELECT * FROM users WHERE email = '$email' ";
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

    static function getByPhone($phone_number = null)
    {
        global $conn;
        $query = "SELECT * FROM users WHERE phone_number = '$phone_number' ";
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

    static function create($auth)
    {
        global $conn;
        extract($auth['data']);

        $role_id = $role ? $role : Roles::getByTitle('user')['data']['role_id'];

        $email_exist = self::getByEmail($email);
        if ($email_exist) {
            return array('status' => 400, 'message' => "{$email} is already in use. Please use a different email address.", 'data' => $email_exist['data']);
        }

        $phone_exist = self::getByPhone($phone_number);
        if ($phone_exist) {
            return array('status' => 400, 'message' => "This phone number is already in use. Please use a different phone number.", 'data' => $phone_exist['data']);
        }

        $query = 'INSERT INTO users VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, NOW(), NULL, NULL)';
        $sql   = $conn->prepare($query);
        $sql->bind_param(
            'sssssss',
            $role_id,
            $name,
            $email,
            $password,
            $phone_number,
            $address,
            $postal_code,
        );
        try {
            $sql->execute();
        } catch (\Exception $e) {
            $sql->close();
            http_response_code(500);
            die($e->getMessage());
        }
        $sql->close();
        $user_created = self::getByEmail($email);
        return array('status' => 201, 'message' => 'Sign-up successful! Welcome to <b>BakeryKho</b>.', 'data' => $user_created['data']);
    }

    static function update($user, $user_id)
    {
        global $conn;

        extract($user);

        $email_exist = self::getByEmail($email);
        if ($email_exist && $email_exist['data']['user_id'] !== $user_id) {
            return array('status' => 400, 'message' => "{$email} is already in use. Please use a different email address.", 'data' => $email_exist['data']);
        }

        $phone_exist = self::getByPhone($phone_number);
        if ($phone_exist && $phone_exist['data']['user_id'] !== $user_id) {
            return array('status' => 400, 'message' => "This phone number is already in use. Please use a different phone number.", 'data' => $phone_exist['data']);
        }

        $query = 'UPDATE users SET 
                    role_id = ?,
                    name = ?,
                    email = ?,
                    password = ?,
                    phone_number = ?,
                    address = ?,
                    postal_code = ?,
                    updated_at = NOW() WHERE user_id = ?';
        $sql   = $conn->prepare($query);
        $sql->bind_param(
            'issssssi',
            $role,
            $name,
            $email,
            $password,
            $phone_number,
            $address,
            $postal_code,
            $user_id,
        );
        try {
            $sql->execute();
        } catch (\Exception $e) {
            $sql->close();
            http_response_code(500);
            die($e->getMessage());
        }
        $sql->close();
        $user_updated = self::getById($user_id);
        return array('status' => 200, 'message' => "User <b>{$name}</b> has been successfully updated.", 'data' => $user_updated['data']);
    }

    static function delete($product_id)
    {
        global $conn;

        $user_exist = self::getById($product_id);
        if ($user_exist) {

            $query = 'DELETE FROM users WHERE user_id = ?';
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
            return array('status' => '200', "message" => "<b>{$user_exist['data']['name']}</b> has been successfully removed.");
        }
        return array('status' => '400', "message" => "An error occurred while trying to delete <b>{$user_exist['data']['name']}</b>. Please try again.");
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
