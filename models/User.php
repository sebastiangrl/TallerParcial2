<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author PELITOS
 */
class User implements IUser {

    private $name;
    private $id;
    static $db;

    public function __construct($name, $id = null) {
        $this->name = $name;
        $this->id = $id;
    }

    public static function validUser($username, $password) {
        self::getConnection();
        //return (count(self::$db->select('*', "User", "username = \"$username\" and password = \"$password\"")) > 0)? true: false;
        //return self::$db->check('*', "User", "username = $user and password = $pass", true);
    }

    public static function getModel($username, $password) {
        $data = singleton::select('*', "User", "username = \"$username\" and password = \"$password\"");
        return $data;
    }

    public static function createUser($userName,$pass) {
        $values = ["username" => $userName, "password" => $pass ];
        $data = singleton::create("User",$values);
        return $data;
    }

    public static function deleteUserChar($param) {
        $values = ["Characterid" => $param];
        $data = singleton::delete("user_has_character", "Characterid = $param", true);
    }

    public function getId(): int {
        return $this->name;
    }

    public function getName(): string {
        return $this->id;
    }

    public function setPassword(): void {
        //self::getConnection();
    }

}
