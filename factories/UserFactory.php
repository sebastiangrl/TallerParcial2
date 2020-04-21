<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserFactory
 *
 * @author PELITOS
 */
class UserFactory implements IUserFactory{

    public static function getUser($objeto): \User {
        return new User($objeto['id'], $objeto['name']);
    }

}
