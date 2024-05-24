<?php

class Flasher
{
    public static function setFlash($status, $message, $data = null)
    {

        if (str_split($status)[0] == 2) {
            $status = 'success';
        } elseif (str_split($status)[0] == 4) {
            $status = 'info';
        }

        $_SESSION['flash'] = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    }

    public static function destroyFlash()
    {
        if (isset($_SESSION['flash'])) {
            unset($_SESSION['flash']);
        }
    }
}
