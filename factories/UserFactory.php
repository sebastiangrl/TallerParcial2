<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserFactory implements IUserFactory {

    public static function newUser($objeto): \User {
        return new User($objeto['id'], $objeto['name']);
    }

    public static function createUser() {

        if (isset($_POST['email']) && isset($_POST['pass'])) {
            $email = $_POST['email'];
            $pass = $_POST['password'];
            
            $objeto = ['email'=>$email, 'password'=>$pass];
            $user = self::newUser($objeto);
            $user->create();
        }
    }

}
