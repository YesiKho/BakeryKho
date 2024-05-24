<?php

class FormAlert
{
    public static function setFormAlert($error, $data)
    {
        $_SESSION['form_alert'] = [
            'error' => $error,
            'data' => $data,
        ];
    }

    public static function destroyFormAlert()
    {
        if (isset($_SESSION['form_alert'])) {
            unset($_SESSION['form_alert']);
        }
    }
}
