<?php

include_once 'app/models/users.php';
include_once 'app/requests/auth/LoginRequest.php';
include_once 'app/helpers/FormAlert.php';
include_once 'app/helpers/Flasher.php';

class AuthenticatedSessionController
{

    static function create()
    {
        return view('pages.auth.sign-in');
    }

    static function store()
    {
        $userValidate = LoginRequest::validate($_POST['auth']);
        $res = Users::authenticate($userValidate);

        if (isset($userValidate['error'])) {
            FormAlert::setFormAlert($userValidate['error'], $userValidate['data']);
            header('Location: ' . BASEURL);
            exit;
        }

        if (str_split($res['status'])[0] == 2) {
            $_SESSION['auth'] = $res['data'];
            if ($_SESSION['auth']['role'] === "SUPER_ADMIN") $_SESSION['auth']['baseurl'] = 'products';
            if ($_SESSION['auth']['role'] === "ADMIN") $_SESSION['auth']['baseurl'] = 'products';
            if ($_SESSION['auth']['role'] === "USER") $_SESSION['auth']['baseurl'] = 'home';
            header('Location: ' . route($_SESSION['auth']['baseurl']));
            exit;
        } elseif (str_split($res['status'])[0] == 4) {
            Flasher::setFlash($res['status'], $res['message'], $res['data']);
            header('Location: ' . BASEURL);
            exit;
        }
    }

    static function destroy()
    {
        if (isset($_SESSION['auth'])) {
            session_unset();
            session_destroy();
            header('Location: ' . BASEURL);
            exit;
        }
    }
}
