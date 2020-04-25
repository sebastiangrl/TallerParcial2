<?php

/**
 *
 * @author PELITOS
 */
interface IUser {
    
    //public function setPass(): void;
    
    static function getUser(int $id);

    static function validUser(string $username, string $password);
    
    function create();
}
