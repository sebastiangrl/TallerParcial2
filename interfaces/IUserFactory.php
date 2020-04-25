<?php

/**
 *
 * @author PELITOS
 */
interface IUserFactory {

    static function newUser(string $username, string $password);
    static function createUser();
    static function getUserInFactory(int $id): IUser;
}
