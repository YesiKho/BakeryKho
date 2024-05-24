<?php

include_once 'app/models/users.php';
include_once 'app/models/roles.php';
include_once 'app/helpers/route.php';
include_once 'app/requests/admin/ProductRequest.php';
include_once 'app/helpers/Flasher.php';
include_once 'app/helpers/FormAlert.php';

class UsersController
{
    static function index()
    {
        view('pages.superAdmin.users.index', ['users' => Users::getAll()]);
    }

    static function create()
    {
        return view('pages.superAdmin.users.create', ['roles' => Roles::getAll()]);
    }

    static function store()
    {
        $userValidate = RegisteredUserRequest::validate($_POST['auth']);

        if (isset($userValidate['error'])) {
            FormAlert::setFormAlert($userValidate['error'], $userValidate['data']);
            header('Location: ' . route('users.create'));
            exit;
        }

        $res = Users::create($userValidate);
        if (str_split($res['status'])[0] == 2) {
            Flasher::setFlash($res['status'], "Successfully added new user <b>{$res['data']['name']}</b>", $res['data']);
            header('Location: ' . route('users'));
            exit;
        } else if (str_split($res['status'])[0] == 4) {
            Flasher::setFlash($res['status'], $res['message'], $userValidate['data']);
            header('Location: ' . route('users.create'));
            exit;
        };
    }

    static function edit(string $id)
    {
        view('pages.superAdmin.users.edit', ['user' => Users::getById($id), 'roles' => Roles::getAll()]);
    }

    static function update(string $id)
    {
        $item = Users::getById($id['user_id']);

        $userValidate = RegisteredUserRequest::validate($_POST['auth']);
        if (isset($userValidate['error'])) {
            FormAlert::setFormAlert($userValidate['error'], $userValidate['data']);
            header('Location: ' . route("users.edit?user_id={$item['data']['user_id']}"));
            exit;
        }
        $res = Users::update($userValidate['data'], $item['data']['user_id']);
        if (str_split($res['status'])[0] == 2) {
            Flasher::setFlash($res['status'], $res['message'], $res['data']);
            header('Location: ' . route('users'));
            exit;
        } elseif (str_split($res['status'])[0] == 4) {
            Flasher::setFlash($res['status'], $res['message'], $res['data']);
            header('Location: ' . route("users.edit?user_id={$item['data']['user_id']}"));
            exit;
        }
    }

    static function destroy(string $id)
    {
        $item = Users::getById($id['user_id']);

        if (str_split($item['status'])[0] == 2) {
            $res = Users::delete($item['data']['user_id']);
        } else if (str_split($item['status'])[0] == 4) {
            Flasher::setFlash($item['status'], $item['message']);
            header('Location: ' . route('users'));
            exit;
        }

        if (str_split($res['status'])[0] == 2) {
            Flasher::setFlash($res['status'], $res['message']);
            header('Location: ' . route('users'));
            exit;
        } else if (str_split($res['status'])[0] == 4) {
            Flasher::setFlash($res['status'], $res['message']);
            header('Location: ' . route('users'));
            exit;
        }
    }
}
