<?php
include_once 'app/helpers/FormRequest.php';

class LoginRequest extends FormRequest
{
    static function validate($auth)
    {
        $email = self::emailValidate($auth['email']);
        $password = self::stringValidate($auth['password']);

        $validated = [];

        if (strlen($email) < 1) {
            $validated['error']['email'] = 'Email is required. Please enter your email address.';
        } elseif (strlen($email) > 255) {
            $validated['error']['email'] = 'Please enter a email with a maximum of 255 characters.';
        }

        if (strlen($password) < 1) {
            $validated['error']['password'] = 'Password is required. Please enter your password.';
        } elseif (strlen($password) > 255) {
            $validated['error']['password'] = 'Please enter a password with a maximum of 255 characters.';
        }

        $validated['data'] = [
            'email' => $email,
            'password' => $password,
        ];

        return $validated;
    }
}
