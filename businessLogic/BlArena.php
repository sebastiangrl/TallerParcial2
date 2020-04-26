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
   
    static function searchFighters(Character $challenger = null) {
        $id = $_SESSION['user']->getId();
        $data = singleton::select("*", "Character", "level between 1-2 and 1+2 and not id in (select Characterid from User_has_Character where userid = $id)");
        return $data;
    }
    
    static function searchMyFighters(Character $challenger = null) {
        $id = $_SESSION['user']->getId();
        $data = singleton::select("*", "Character", "id in (select Characterid from User_has_Character where userid = $id)");
        return $data;
    }
}
