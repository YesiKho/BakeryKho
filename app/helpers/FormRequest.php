<?php

class FormRequest
{

    static function stringValidate($string)
    {
        $string = htmlspecialchars($string);
        $string = str_replace(' ', '-', $string);
        $string = preg_replace('/-+/', '-', $string);
        $string = trim(rtrim($string, '-'), '-');
        $string = str_replace('-', ' ', $string);
        $string = strtolower($string);

        return $string;
    }

    static function alphabetStringValidate($string)
    {
        $string = htmlspecialchars($string);
        $string = str_replace(' ', '-', $string);
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
        $string = preg_replace('/-+/', '-', $string);
        $string = trim(rtrim($string, '-'), '-');
        $string = str_replace('-', ' ', $string);
        $string = strtolower($string);

        return $string;
    }

    static function numericStringValidate($string)
    {
        $string = htmlspecialchars($string);
        $string = str_replace(' ', '-', $string);
        $string = preg_replace('/[^0-9]/', '', $string);
        $string = preg_replace('/-+/', '-', $string);
        $string = trim(rtrim($string, '-'), '-');
        $string = str_replace('-', ' ', $string);

        return $string;
    }

    static function emailValidate($email)
    {
        $emailSanitize = filter_var($email, FILTER_SANITIZE_EMAIL);
        return $emailSanitize;
    }

    static function integerValidate($int)
    {
        $intSanitize = filter_var($int, FILTER_SANITIZE_NUMBER_INT);
        return $intSanitize;
    }
}
