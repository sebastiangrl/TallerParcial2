<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BlArena
 *
 * @author PELITOS
 */
class BlArena {
    static $db;
    
    private static function getConnection() {
        self::$db = new MySQLiManager('localhost', 'root', '', 'mmorpg');
    }
    
    static function searchFighters(Character $challenger = null) {
        self::getConnection();
        //$level = $challenger->getLevel();
        $data = self::$db->select("*", "character", "level between 1-2 and 1+2 and not id in (select Characterid from user_has_character where userid = 1)");
        return $data;
    }
}
