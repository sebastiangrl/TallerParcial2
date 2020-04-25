<?php

/**
 *
 * @author PELITOS
 */
interface IUser {

    static function getUser(int $id);

    static function validUser(string $username, string $password);
    
    function create();
}
