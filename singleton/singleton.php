<?php

require_once LVENDORS . 'MySQLiManager/MySQLiManager.php';

class singleton {

    private static $db;

    private static function getConnection() {
        if (!isset(self::$db)) {
            self::$db = new MySQLiManager('localhost', 'root', '', 'mmorpg');
        }
    }

    public static function select($values, $table, $where) {
        self::getConnection();
        $results = self::$db->select($values, $table, $where);
        return $results;
    }

    public static function create($table, $values) {
        self::getConnection();
        $results = self::$db->insert($table, $values);
        return $results;
    }

    public static function update($table, $values, $where) {
        self::getConnection();
        $results = self::$db->update($table, $values, $where);
        return $results;
    }

    public static function delete($table, $values,$complex = false) {
        self::getConnection();
        $results = self::$db->delete($table, $values, $complex);
        return $results;
    }
    
    public function __clone() {
        trigger_error("La clonación de este objeto no esta permitida");
    }
    
    
}
