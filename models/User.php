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
require_once LVENDORS . 'MySQLiManager/MySQLiManager.php';
class User implements IUser{
    private $name;
    private $id;
    static $db;
    
    public function __construct($name, $id = null) {
        $this->name = $name;
        $this->id = $id;
    }
    
    private static function getConnection() {
        self::$db = new MySQLiManager('localhost', 'root', '', 'mmorpg');
    }
    
    public static function validUser($username, $password){
        self::getConnection();
        //return (count(self::$db->select('*', "User", "username = \"$username\" and password = \"$password\"")) > 0)? true: false;
        //return self::$db->check('*', "User", "username = $user and password = $pass", true);
    }
    
    public static function getModel($username, $password){
        self::getConnection();   
        return self::$db->select('*', "User", "username = \"$username\" and password = \"$password\"");
    }

    public function getId(): int {
        return $this->name;
    }

    public function getName(): string {
        return $this->id;
    }

    public function setPassword(): void {
        self::getConnection();   
        
    }

}
