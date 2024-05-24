<?php

include_once 'app/models/users.php';
include_once 'app/requests/auth/RegisteredUserRequest.php';
include_once 'app/helpers/formAlert.php';
include_once 'app/helpers/route.php';

class RegisteredUserController
{
    static function create()
    {
        return view('pages.auth.sign-up');
    }

    static function store()
    {
        $userValidate = RegisteredUserRequest::validate($_POST['auth']);

        if (isset($userValidate['error'])) {
            FormAlert::setFormAlert($userValidate['error'], $userValidate['data']);
            header('Location: ' . route('register'));
            exit;
        }

        $res = Users::create($userValidate);
        if (str_split($res['status'])[0] == 2) {
            Flasher::setFlash($res['status'], $res['message'], $res['data']);
            header('Location: ' . BASEURL);
            exit;
        } else if (str_split($res['status'])[0] == 4) {
            Flasher::setFlash($res['status'], $res['message'], $userValidate['data']);
            header('Location: ' . route('register'));
            exit;
        };
    }
}
