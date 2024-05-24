<?php

require_once __DIR__ . '/../../config/database.php';

class Roles
{

    static function getAll()
    {
        global $conn;
        $query = "SELECT * FROM roles";
        $result = $conn->query($query);

        $res = array('data' => []);

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($res['data'], $row);
            }
        }
        $res['status'] = http_response_code(200);

        return $res;
    }

    static function getByID($id = null)
    {
        global $conn;
        $query = "SELECT * FROM roles WHERE role_id ='$id'";
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

    static function getByTitle($title = null)
    {
        global $conn;
        $title = strtoupper($title);
        $query = "SELECT * FROM roles WHERE title ='$title'";
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
}
