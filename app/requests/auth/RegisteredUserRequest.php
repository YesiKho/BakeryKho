<?php
include_once 'app/helpers/FormRequest.php';

class RegisteredUserRequest extends FormRequest
{
    static function validate($auth)
    {
        $name = self::alphabetStringValidate($auth['name']);
        $email = self::emailValidate($auth['email']);
        $password = self::stringValidate($auth['password']);
        $confirm_password = self::stringValidate($auth['confirm_password']);
        $address = self::stringValidate($auth['address']);
        $postal_code = self::numericStringValidate($auth['postal_code']);
        $phone_number = self::numericStringValidate($auth['phone_number']);
        $role = $auth['role'] ?? '';

        $validated = [];

        if (strlen($name) < 1) {
            $validated['error']['name'] = 'Name is required. Please fill in this field.';
        } elseif (strlen($name) > 255) {
            $validated['error']['name'] = 'Please enter a name with a maximum of 255 characters.';
        }

        if (strlen($email) < 1) {
            $validated['error']['email'] = 'Email is required. Please enter your email address.';
        } elseif (strlen($email) > 255) {
            $validated['error']['email'] = 'Please enter a email with a maximum of 255 characters.';
        }

        if (strlen($password) < 1) {
            $validated['error']['password'] = 'Password is required. Please fill in this field.';
        } elseif (strlen($password) < 6) {
            $validated['error']['password'] = 'Password Must Be At Least 6 Characters Long.';
        } elseif (strlen($password) > 255) {
            $validated['error']['password'] = 'Please enter a password with a maximum of 255 characters.';
        }

        if (strlen($confirm_password) < 1) {
            $validated['error']['confirm_password'] = 'Confirm Password is required. Please fill in this field.';
        } elseif (strlen($confirm_password) < 6) {
            $validated['error']['confirm_password'] = 'Confirm Password Must Be At Least 6 Characters Long.';
        } elseif (strlen($confirm_password) > 255) {
            $validated['error']['confirm_password'] = 'Please enter a Confirm Password with a maximum of 255 characters.';
        }

        if ($password !== $confirm_password) {
            $validated['error']['not_match_password'] = 'Passwords do not match. Please ensure both passwords are identical.';
        }
        if (strlen($phone_number) < 1) {
            $validated['error']['phone_number'] = 'Please fill in the phone number field.';
        } elseif (strlen($phone_number) > 13) {
            $validated['error']['phone_number'] = 'Please enter a phone number with a maximum of 13 characters.';
        }

        $validated['data'] = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'confirm_password' => $confirm_password,
            'address' => $address,
            'postal_code' => $postal_code,
            'phone_number' => $phone_number,
            'role' => $role,
        ];

        return $validated;
    }
}
