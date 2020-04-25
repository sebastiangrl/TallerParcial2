<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once LVENDORS . 'MySQLiManager/MySQLiManager.php';

class User implements IUser {

    private $name;
    private $pass;
    private $id;
    static $db;

    public function __construct($name, $pass, $id = null) {
        $this->name = $name;
        $this->pass = $pass;
        $this->id = $id;
    }

    private static function getConnection() {
        self::$db = new MySQLiManager('localhost', 'root', '', 'mmorpg');
    }

    public static function getUser(int $id) {
        self::getConnection();
        $data = self::$db->select('*', "User", "id = $id");
        return $data[0];
    }

    public static function validUser($username, $password) {
        self::getConnection();
        $values = ["username" => $username, "password" => $password];
        //$values = "username = $username and password = $password";
        $response = self::$db->check('*',"User",$values, false);
        //print_r($response);
        return $response;
    }

    public function create() {
        self::getConnection();
        $values = ["username" => $this->getName(), "password" => $this->getPass()];
        $data = self::$db->insert("User", $values);
    }

    public function getName() {
        return $this->name;
    }

    function getPass() {
        return $this->pass;
    }

    function setPass() {
        self::getConnection();
    }

    public function getId() {
        return $this->name;
    }

}
