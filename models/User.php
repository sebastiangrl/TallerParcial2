<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once LVENDORS . 'MySQLiManager/MySQLiManager.php';

class User implements IUser {

    private $name;
    private $id;

    public function __construct($name, $id) {
        $this->name = $name;
        $this->id = $id;
    }

    private static function getConnection() {
        self::$db = new MySQLiManager('localhost', 'root', '', 'mmorpg');
    }

    public static function getModel(int $id) {
        self::getConnection();
        $data = self::$db->select('*', "User", "id = $id");
        return $data[0];
    }

    public function create() {
        self::getConnection();
        //print_r(get_object_vars($this));
        $values = ["name" => $this->getName(), "level" => $this->getId()];
        $data = self::$db->insert("User", $values);
    }

    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }

}
