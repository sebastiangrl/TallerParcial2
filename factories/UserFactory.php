<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserFactory implements IUserFactory {

    public static function createUser() {

        if (isset($_POST['user']) && isset($_POST['password'])) {
            $userName = $_POST['user'];
            $pass = $_POST['password'];
            $user = UserFactory::newUser($userName, $pass);
            $user->createUser($userName,$pass);
        }
    }

    public static function searchUser(string $username, string $password): \IUser {
        $data = User::getModel($username, $password);
        $user = UserFactory::getUser($data[0]);
        return $user;
    }

    public static function getUser($objeto): \User {
        return new User($objeto['id'], $objeto['username']);
    }

    public static function newUser(string $username, string $password): \User {
        return new User($username, $password, null);
    }

    public static function getUserInFactory(int $id): \IUser {
        $user = User::getUser($id);
        return $user;
    }

}
