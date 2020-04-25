<?php

/**
 *
 * @author PELITOS
 */
interface IUser {
    
    public function getId(): int;
    
    static function getUser(int $id);

    static function validUser(string $username, string $password);
    
    function create();
}
